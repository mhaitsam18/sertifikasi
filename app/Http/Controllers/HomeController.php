<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (auth()->user()->role_id) {
            case 1:
                return redirect()->intended('/dashboard');
                break;
            case 2:
                return redirect()->intended('/mahasiswa');
                break;
            case 3:
                return redirect()->intended('/dosen');
                break;
            default:
                # code...
                break;
        }
        // return view('home');
    }

    public function updateProfil(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            // 'tentang' => 'max:255',
            'foto' => 'image|file|max:4096',
        ];
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }
        $validateData = $request->validate($rules);
        if ($request->file('foto')) {
            if ($request->oldFoto && $request->oldFoto != 'default.jpg') {
                Storage::delete($request->oldFoto);
            }
            $validateData['foto'] = $request->file('foto')->store('foto-profil');
        }
        User::where('id', $user->id)
            ->update($validateData);
        return back()->with('success', 'Data Profil telah diperbarui!');
    }

    public function updatePassword(Request $request, User $user)
    {
        $rules = [
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ];
        $validateData = $request->validate($rules);
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Your Current password does not match with our record'
            ]);
        }
        User::where('id', auth()->user()->id)
            ->update(['password' => Hash::make($request->password)]);
        // auth()->user()->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Kata Sandi telah diperbarui!');
    }

    public function putImg(Request $request)
    {
        $url = asset('storage/' . $request->image);
        $contents = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        echo $name;
        echo $url;
        Storage::put($name, $contents);
    }
}
