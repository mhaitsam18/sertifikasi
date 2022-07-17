<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Dosen;
use App\Models\JadwalAcara;
use App\Models\KelasAcara;
use App\Models\Materi;
use App\Models\Peserta;
use App\Models\StatusJadwal;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    public function index()
    {
        return view('dosen.kaprodi.index', [
            'title' => "Sertifikasi | Kaprodi",
            'kategori_acara' => "Acara",
            'list_acara' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->whereIn('acara.status_acara_id', [2, 6])
                ->leftJoin('kelas_acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                ->get()
        ]);
    }
    public function pelatihan()
    {
        return view('dosen.kaprodi.index', [
            'title' => "Sertifikasi | Kaprodi | Pelatihan",
            'kategori_acara' => "Pelatihan",
            'list_acara' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('acara.kategori_acara_id', 2)
                ->whereIn('acara.status_acara_id', [2, 6])
                ->leftJoin('kelas_acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                ->get()
        ]);
    }
    public function sertifikasi()
    {
        return view('dosen.kaprodi.index', [
            'title' => "Sertifikasi | Kaprodi | Sertifikasi",
            'kategori_acara' => "Sertifikasi",
            'list_acara' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('acara.kategori_acara_id', 1)
                ->whereIn('acara.status_acara_id', [2, 6])
                ->leftJoin('kelas_acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                ->get()
        ]);
    }
    public function histori()
    {
        return view('dosen.kaprodi.histori', [
            'title' => "Sertifikasi | Kaprodi | Pelatihan",
            'list_acara' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('acara.status_acara_id', 7)
                ->leftJoin('kelas_acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                ->get()
        ]);
    }

    public function master()
    {
        return view('dosen.kaprodi.master', [
            'title' => "Kaprodi | Master Pelatihan dan Sertifikasi",
            'list_acara' => Acara::withTrashed()->get()
        ]);
    }

    public function peserta(Request $request)
    {
        return view('dosen.kaprodi.peserta', [
            'title' => 'Sertifikasi | Anggota Kelas',
            'acara' => Acara::where('id', $request->acara_id)->first(),
            'list_peserta' => Peserta::where([
                'acara_id' => $request->acara_id,
            ])->with(['mahasiswa', 'statusPeserta', 'nilai'])->get()
        ]);
    }

    public function pesertaLulus(Request $request)
    {
    }
}
