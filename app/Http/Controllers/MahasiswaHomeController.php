<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Berita;
use App\Models\Chat;
use App\Models\JadwalAcara;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Peserta;
use App\Models\Nilai;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MahasiswaHomeController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index', [
            'title' => 'Sertifikasi | Home Mahasiswa',
            'list_acara' => Acara::where('is_valid', 1)->whereNotIn('status_acara_id', [7])->latest()->paginate(3)->withQueryString(),
            'tagihan' => Peserta::select(DB::raw('SUM(sisa_tagihan) AS total_tagihan'))->where('mahasiswa_id', session()->get('mahasiswa_id'))->first(),
            'sertifikasi' => Peserta::select(DB::raw('COUNT(peserta.id) AS jumlah'))
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')
                ->where([
                    'mahasiswa_id' => session()->get('mahasiswa_id'),
                    'kategori_acara_id' => 1
                ])
                ->whereIn('status_peserta_id', [1, 3])
                ->first(),
            'pelatihan' => Peserta::select(DB::raw('COUNT(peserta.id) AS jumlah'))
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')
                ->where([
                    'mahasiswa_id' => session()->get('mahasiswa_id'),
                    'kategori_acara_id' => 2
                ])
                ->whereIn('status_peserta_id', [1, 3])
                ->first(),
            'nilai' => Nilai::select(DB::raw('COUNT(nilai.id) AS jumlah'))
                ->join('peserta', 'peserta.id', '=', 'nilai.peserta_id')
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))->first(),
            'sertifikat' => Sertifikat::select(DB::raw('COUNT(sertifikat.id) AS jumlah'))
                ->join('peserta', 'peserta.id', '=', 'sertifikat.peserta_id')
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))->first(),
            'list_berita' => Berita::whereNotNull('publish_at')->latest()->paginate(2)->withQueryString(),
        ]);
    }

    public function profil()
    {

        return view('mahasiswa.profil', [
            'title' => 'Sertifikasi | Profil',
            'list_nilai' => Nilai::select('nilai.*')
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))
                ->whereNotNull('sertifikat')
                ->join('peserta', 'nilai.peserta_id', '=', 'peserta.id')
                ->get(),
            'list_sertifikat' => Sertifikat::select('sertifikat.*')
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))
                ->whereNotNull('sertifikat')
                ->join('peserta', 'sertifikat.peserta_id', '=', 'peserta.id')
                ->get(),
            'jadwal_hari_ini' => DB::table('jadwal_acara')
                ->select('jadwal_acara.*', 'acara.*')
                ->join('kelas_acara', 'jadwal_acara.kelas_acara_id', '=', 'kelas_acara.id')
                ->join('acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->join('peserta', 'peserta.acara_id', '=', 'acara.id')
                ->join('mahasiswa', 'peserta.mahasiswa_id', '=', 'mahasiswa.id')
                ->join('users', 'mahasiswa.user_id', '=', 'users.id')
                ->where([
                    'mahasiswa_id' => session()->get('mahasiswa_id'),
                    'tanggal' => date('Y-m-d'),
                ])
                ->get(),
            'data_pesan' => User::where('id', '!=', auth()->user()->id)->get(),
            'tanggal_lahir' => Carbon::parse(auth()->user()->tanggal_lahir)->translatedFormat('d F Y')
        ]);
    }
    public function editProfil()
    {
        return view('mahasiswa.edit-profil', [
            'title' => 'Sertifikasi | Edit Profil',
            'list_kelas' => Kelas::all(),
            'mahasiswa' => Mahasiswa::where('user_id', auth()->user()->id)->with('user')->first()
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            // 'nim' => 'required|max:255',
            'kelas_id' => 'required',
            'scan_ktm' => 'image|file|max:10000',
            'ksm' => 'mimes:pdf|max:10000',
            'transkip_nilai' => 'mimes:pdf|max:10000',
        ];
        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'required|unique:mahasiswa';
        }
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;
        if ($request->file('scan_ktm')) {
            if ($request->oldKtm && $request->oldKtm != 'ktm.jpg') {
                Storage::delete($request->oldKtm);
            }
            $validateData['scan_ktm'] = $request->file('scan_ktm')->store('ktm-mahasiswa');
        }
        if ($request->file('ksm')) {
            if ($request->oldKsm && $request->oldKsm != 'ksm.jpg') {
                Storage::delete($request->oldKsm);
            }
            $validateData['ksm'] = $request->file('ksm')->store('ksm-mahasiswa');
        }
        if ($request->file('transkip_nilai')) {
            if ($request->oldTranskip_nilai && $request->oldTranskip_nilai != 'transkip-nilai.jpg') {
                Storage::delete($request->oldTranskip_nilai);
            }
            $validateData['transkip_nilai'] = $request->file('transkip_nilai')->store('transkip-nilai-mahasiswa');
        }
        Mahasiswa::where('id', $mahasiswa->id)
            ->update($validateData);
        return back()->with('success', 'Data Mahasiswa telah diperbarui!');
    }
}
