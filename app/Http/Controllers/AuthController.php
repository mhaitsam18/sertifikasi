<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Berita;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Fasilitas;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index', [
            'title' => 'Sertifikasi | Telkom University',
            'acara_dibuka' => Acara::where([
                'status_acara_id' => 2,
            ])->latest()->get(),
            'sertifikasi' => Acara::where([
                'kategori_acara_id' => 1,
                'status_acara_id' => 6,
            ])->latest()->first(),
            'pelatihan' => Acara::where([
                'kategori_acara_id' => 2,
                'status_acara_id' => 6,
            ])->latest()->first(),
            'berita' => Berita::latest()->with('penulis')->first(),
        ]);
    }
    public function login()
    {
        return view('auth.loginv2', ['title' => 'Login']);
    }

    public function registrasi()
    {
        return view('auth.registrasi', [
            'title' => 'Registrasi',
            'active' => 'registrasi',
            'list_kelas' => Kelas::all()
        ]);
    }

    public function store(request $request)
    {
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tentang' => 'max:255',
            'foto' => 'image|file',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role_id'] = 2;

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-profil');
        };

        $validatedMahasiswa = $request->validate([
            'nim' => 'required',
            'kelas_id' => 'required',
            'scan_ktm' => 'image|file',
        ]);

        if ($request->file('scan_ktm')) {
            $validatedMahasiswa['scan_ktm'] = $request->file('scan_ktm')->store('ktm-mahasiswa');
        }
        $user = User::create($validatedData);

        $validatedMahasiswa['user_id'] = $user->id;

        Mahasiswa::create($validatedMahasiswa);


        // return $request->all();

        // $request->session()->flash('success', 'Registration Successfull, Please Login!');
        // Atau

        return redirect('/login')->with('success', 'Registration Successfull, Please Login!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            switch (auth()->user()->role_id) {
                case 1:
                    return redirect()->intended('/dashboard');
                    break;
                case 2:
                    $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->first();
                    $request->session()->put('mahasiswa_id', $mahasiswa->id);
                    return redirect()->intended('/mahasiswa');
                    break;
                case 3:
                    $dosen = Dosen::where('user_id', auth()->user()->id)->first();
                    $request->session()->put('dosen_id', $dosen->id);
                    return redirect()->intended('/dosen');
                    break;
                default:
                    # code...
                    break;
            }
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function resetPassword(Request $request, User $user)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function berita()
    {
        return view('auth.berita.index', [
            'title' => 'Sertifikasi | Halaman Berita',
            'list_berita' => Berita::whereNotNull('publish_at')->latest()->paginate(8)->withQueryString(),
        ]);
    }

    public function acaraBuka()
    {
        return view('auth.acara.index', [
            'title' => 'Sertifikasi | Pelatihan / Sertifikasi yang dibuka',
            'event' => 'Acara',
            'list_acara' => Acara::where(['is_valid' => 1, 'status_acara_id' => 2])->latest()->paginate(8)->withQueryString(),
        ]);
    }

    public function acaraLangsung()
    {
        return view('auth.acara.index', [
            'title' => 'Sertifikasi | Pelatihan / Sertifikasi yang sedang berlangsung',
            'event' => 'Acara',
            'list_acara' => Acara::where(['is_valid' => 1, 'status_acara_id' => 6])->latest()->paginate(8)->withQueryString(),
        ]);
    }

    public function showAcara(Acara $acara)
    {
        return view('auth.acara.show', [
            'title' => "Acara",
            'acara' => $acara,
            'list_fasilitas' => Fasilitas::where('acara_id', $acara->id)->get(),
        ]);
    }

    public function showBerita(Berita $berita)
    {
        return view('auth.berita.show', [
            'title' => "Berita",
            'berita' => $berita
        ]);
    }
}
