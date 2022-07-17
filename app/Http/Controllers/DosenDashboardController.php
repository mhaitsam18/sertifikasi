<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DosenDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function index()
    {
        return view('dosen.index', [
            'title' => "Sertifikasi | Dashboard",
            'list_peserta_sertifikasi' => Peserta::join('acara', 'acara.id', '=', 'peserta.acara_id')->where(['koordinator_id' => session()->get('dosen_id'), 'kategori_acara_id' => 1])->get(),
            'list_peserta_pelatihan' => Peserta::join('acara', 'acara.id', '=', 'peserta.acara_id')->where(['koordinator_id' => session()->get('dosen_id'), 'kategori_acara_id' => 2])->get(),
            'list_acara' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('kelas_acara.instruktur_id', session()->get('dosen_id'))
                ->whereIn('acara.status_acara_id', [6])
                ->leftJoin('kelas_acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                // ->leftJoin('peserta', 'peserta.acara_id', '=', 'acara.id')
                // ->join('kelas_acara', function ($join) {
                //     $join->on('kelas_acara.acara_id', '=', 'acara.id')
                //         ->where('kelas_acara.instruktur_id', '=', session()->get('dosen_id'));
                // })
                // ->groupByRaw('acara.*')
                ->get()
        ]);
    }

    public function profil()
    {

        return view('dosen.profil', [
            'title' => 'Sertifikasi | Profil',
            // 'dosen' => dosen::where('user_id', auth()->user()->id)->with('user')->first(),
            'tanggal_lahir' => Carbon::parse(auth()->user()->tanggal_lahir)->translatedFormat('d F Y')
        ]);
    }
    public function editProfil()
    {
        return view('dosen.edit-profil', [
            'title' => 'Sertifikasi | Edit Profil',
            'dosen' => Dosen::where('user_id', auth()->user()->id)->with('user')->first()
        ]);
    }

    public function update(Request $request, Dosen $dosen)
    {
        $rules = [
            // 'kode_dosen' => 'required',
            // 'nidn' => 'required',
            // 'nip' => 'required',
        ];
        if ($request->kode_dosen != $dosen->kode_dosen) {
            $rules['kode_dosen'] = 'required|unique:dosen';
        }
        if ($request->nidn != $dosen->nidn) {
            $rules['nidn'] = 'required|unique:dosen';
        }
        if ($request->nip != $dosen->nip) {
            $rules['nip'] = 'required|unique:dosen';
        }
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;
        // $validateData['is_kaprodi'] = $request->is_kaprodi;
        // $validateData['is_koordinator'] = $request->is_koordinator;

        Dosen::where('id', $dosen->id)
            ->update($validateData);
        return back()->with('success', 'Data dosen telah diperbarui!');
    }

    public function destroy(Dosen $dosen)
    {
        User::destroy($dosen->user_id);
        return redirect('/logout')->with('success', 'Akun Dosen dinonaktifkan!');
    }

    public function restore(Request $request)
    {
        User::where('id', $request->id)->restore();
        return redirect('/dosen')->with('success', 'Akun Dosen dipulihkan!');
    }
}
