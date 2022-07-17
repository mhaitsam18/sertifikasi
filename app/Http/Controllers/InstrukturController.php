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

class InstrukturController extends Controller
{
    public function index(Request $request)
    {
        if (!isset($request->status)) {
            $status = [6, 7];
        } elseif ($request->status == 'ongoing') {
            $status = [6];
        } else {
            $status = [7];
        }
        return view('dosen.instruktur.index', [
            'title' => 'Sertifikasi | Instruktur',
            'status' => $request->status,
            'list_acara' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('kelas_acara.instruktur_id', session()->get('dosen_id'))
                ->whereIn('acara.status_acara_id', $status)
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

    public function list(Request $request)
    {
        if (!isset($request->status)) {
            $status = [6, 7];
        } elseif ($request->status == 'ongoing') {
            $status = [6];
        } else {
            $status = [7];
        }
        return view('dosen.instruktur.list', [
            'title' => 'Sertifikasi | Instruktur',
            'status' => $request->status,
            'list_acara_ongoing' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
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
                ->get(),
            'list_acara_finished' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('kelas_acara.instruktur_id', session()->get('dosen_id'))
                ->whereIn('acara.status_acara_id', [7])
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

    public function histori()
    {
        return view('dosen.instruktur.histori', [
            'title' => 'Sertifikasi | Instruktur',
            'list_pelatihan' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('kelas_acara.instruktur_id', session()->get('dosen_id'))
                ->where('acara.kategori_acara_id', 2)
                ->whereIn('acara.status_acara_id', [7])
                ->leftJoin('kelas_acara', 'kelas_acara.acara_id', '=', 'acara.id')
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                // ->leftJoin('peserta', 'peserta.acara_id', '=', 'acara.id')
                // ->join('kelas_acara', function ($join) {
                //     $join->on('kelas_acara.acara_id', '=', 'acara.id')
                //         ->where('kelas_acara.instruktur_id', '=', session()->get('dosen_id'));
                // })
                // ->groupByRaw('acara.*')
                ->get(),
            'list_sertifikasi' => Acara::selectRaw('acara.*, COUNT(kelas_acara.id) AS jumlah_kelas, COUNT(peserta.id) AS jumlah_peserta')
                ->groupBy('acara.id')
                ->where('acara.kategori_acara_id', 1)
                ->where('kelas_acara.instruktur_id', session()->get('dosen_id'))
                ->whereIn('acara.status_acara_id', [7])
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

    public function acara(Acara $acara)
    {
        return view('dosen.instruktur.acara', [
            'title' => 'Sertifikasi | Daftar Kelas',
            'acara' => $acara,
            'list_materi' => Materi::where('acara_id', $acara->id)->with(['acara'])->get(),
            'list_kelas' => KelasAcara::selectRaw('kelas_acara.*, COUNT(peserta.id) AS jumlah_anggota')
                ->where([
                    'kelas_acara.acara_id' => $acara->id,
                    // 'instruktur_id' => session()->get('dosen_id')
                ])
                ->leftJoin('peserta', 'peserta.kelas_acara_id', '=', 'kelas_acara.id')
                ->groupBy('kelas_acara.id')
                ->get()
        ]);
    }

    public function jadwal(KelasAcara $kelasAcara)
    {
        return view('dosen.instruktur.jadwal', [
            'title' => 'Sertifikasi | Jadwal Kelas',
            'acara' => Acara::where('id', $kelasAcara->acara_id)->first(),
            'kelas' => $kelasAcara,
            'list_status' => StatusJadwal::all(),
            'list_jadwal' => JadwalAcara::selectRaw('jadwal_acara.*, COUNT(berita_acara.id) AS jumlah_bap, berita_acara.id AS id_bap')
                ->leftJoin('berita_acara', 'berita_acara.jadwal_acara_id', '=', 'jadwal_acara.id')
                ->where([
                    'kelas_acara_id' => $kelasAcara->id,
                ])
                ->groupBy('jadwal_acara.id')
                ->get()
        ]);
    }

    public function peserta(KelasAcara $kelasAcara)
    {
        return view('dosen.instruktur.peserta', [
            'title' => 'Sertifikasi | Anggota Kelas',
            'acara' => Acara::where('id', $kelasAcara->acara_id)->first(),
            'kelas' => $kelasAcara,
            'list_peserta' => Peserta::where([
                'kelas_acara_id' => $kelasAcara->id,
            ])->with(['mahasiswa', 'statusPeserta', 'nilai'])->get()
        ]);
    }
}
