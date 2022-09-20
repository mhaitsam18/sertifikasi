<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dosen.index', [
            'title' => "Data Dosen",
            'list_dosen' => Dosen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosen.create', [
            'title' => "Buat Dosen"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'nama_dan_gelar' => 'max:255',
            'email' => 'required|email:dns|unique:users',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tentang' => 'required',
            'foto' => 'image|file',
            'password' => 'required|confirmed',
        ]);
        // $validateData['password'] = Hash::make('1234');
        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role_id'] = '3';
        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('foto-profil');
        }

        $validateData2 = $request->validate([
            'kode_dosen' => 'required|unique:dosen|max:3|min:3',
            'nidn' => 'required|unique:dosen',
            'nip' => 'required|unique:dosen'
        ]);

        if ($request->is_kaprodi) {
            $validateData2['is_kaprodi'] = $request->is_kaprodi;
        }
        if ($request->is_koordinator) {
            $validateData2['is_koordinator'] = $request->is_koordinator;
        }
        $user = User::create($validateData);

        $validateData2['user_id'] = $user->id;
        Dosen::create($validateData2);


        return redirect('/dashboard/dosen')->with('success', 'Dosen baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('admin.dosen.show', [
            'title' => "Detail Dosen",
            'dosen' => $dosen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', [
            'title' => "Edit Dosen",
            'dosen' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $rules = [];
        if ($request->kode_dosen != $dosen->kode_dosen) {
            $rules['kode_dosen'] = 'required|unique:dosen|max:3|min:3';
        }
        if ($request->nidn != $dosen->nidn) {
            $rules['nidn'] = 'required|unique:dosen';
        }
        if ($request->nip != $dosen->nip) {
            $rules['nip'] = 'required|unique:dosen';
        }

        $validateData = $request->validate($rules);

        if ($request->is_kaprodi) {
            $validateData['is_kaprodi'] = $request->is_kaprodi;
        }
        if ($request->is_koordinator) {
            $validateData['is_koordinator'] = $request->is_koordinator;
        }
        Dosen::where('id', $dosen->id)->update($validateData);


        return redirect('/dashboard/dosen')->with('success', 'Profil dosen telah diperbarui!');
    }

    public function updateProfil(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|max:255',
            'nama_dan_gelar' => 'max:255',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tentang' => 'required',
            'foto' => 'image|file'
        ];
        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect('/dashboard/dosen')->with('success', 'Data Dosen telah dihapus / dinonaktifkan!');
    }

    public function restore(Request $request)
    {
        Dosen::where('id', $request->id)->restore();
        return redirect('/dashboard/dosen')->with('success', 'Data Dosen telah dipulihkan / diaktifkan!');
    }
}
