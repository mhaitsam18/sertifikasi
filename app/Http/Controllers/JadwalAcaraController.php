<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\BeritaAcara;
use App\Models\JadwalAcara;
use App\Models\Dosen;
use App\Models\KelasAcara;
use App\Models\Presensi;
use App\Models\StatusJadwal;
use Illuminate\Http\Request;

class JadwalAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = "Data Jadwal";
        $data['acara'] = Acara::where('id', $request->acara_id)->first();
        $data['list_status'] = StatusJadwal::all();
        if ($request->kelas_id) {
            $data['list_jadwal'] = JadwalAcara::select('*', 'jadwal_acara.id AS jadwal_id', 'kelas_acara.nama AS nama_kelas', 'acara.nama AS nama_acara', 'users.nama AS nama_instruktur')->where('kelas_acara_id', $request->kelas_id)
                ->join('dosen', 'dosen.id', '=', 'jadwal_acara.instruktur_id')
                ->join('users', 'users.id', '=', 'dosen.user_id')
                ->join('status_jadwal', 'status_jadwal.id', '=', 'jadwal_acara.status_jadwal_id')
                ->join('kelas_acara', 'kelas_acara.id', '=', 'jadwal_acara.kelas_acara_id')
                ->join('acara', 'acara.id', '=', 'kelas_acara.acara_id')
                ->get();
            $data['kelas'] = KelasAcara::where('id', $request->kelas_id)->first();
        } else {
            $data['list_jadwal'] = JadwalAcara::select('*', 'jadwal_acara.id AS jadwal_id', 'kelas_acara.nama AS nama_kelas', 'acara.nama AS nama_acara', 'users.nama AS nama_instruktur')->where('acara_id', $request->acara_id)
                ->join('dosen', 'dosen.id', '=', 'jadwal_acara.instruktur_id')
                ->join('users', 'users.id', '=', 'dosen.user_id')
                ->join('status_jadwal', 'status_jadwal.id', '=', 'jadwal_acara.status_jadwal_id')
                ->join('kelas_acara', 'kelas_acara.id', '=', 'jadwal_acara.kelas_acara_id')
                ->join('acara', 'acara.id', '=', 'kelas_acara.acara_id')
                ->get();
            $data['kelas'] = null;
        }

        return view('dosen.koordinator.acara.jadwal.index', $data);
    }

    public function ubahStatusJadwal(Request $request)
    {
        JadwalAcara::where('id', $request->jadwal_acara_id)
            ->update([
                'status_jadwal_id' => $request->status_jadwal_id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = "Tambah Jadwal";
        $data['acara'] = Acara::where('id', $request->acara_id)->first();
        $data['list_instruktur'] = Dosen::join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')
            ->where('acara_id', $request->acara_id)->with('user')
            ->get();
        $data['list_kelas'] = KelasAcara::where('acara_id', $request->acara_id)->get();
        if ($request->kelas_id) {
            $data['kelas'] = KelasAcara::where('id', $request->kelas_id)->first();
        } else {
            $data['kelas'] = null;
        }

        return view('dosen.koordinator.acara.jadwal.create', $data);
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
            // 'acara_id' => 'required',
            'instruktur_id' => 'required',
            'ruangan' => 'required',
            'link' => 'max:255',
            'materi' => 'required',
            'tanggal' => 'required',
            'waktu_dimulai' => 'required',
            'waktu_selesai' => 'required',
            'keterangan' => 'required',
        ]);
        if ($request->ujian) {
            $validateData['is_ujian'] = $request->is_ujian;
        } else {
            $validateData['is_ujian'] = 0;
        }
        if ($request->kelas_acara_id = "all") {
            $list_kelas = KelasAcara::where('acara_id', $request->acara_id)->get();
            foreach ($list_kelas as $kelas) {
                $validateData['kelas_acara_id'] = $kelas->id;
                if ($request->instruktur_id == 'each') {
                    $validateData['instruktur_id'] = $kelas->instruktur_id;
                }
                JadwalAcara::create($validateData);
            }
        } else {
            $kelas = KelasAcara::where('id', $request->kelas_acara_id)->first();
            if ($request->instruktur_id == 'each') {
                $validateData['instruktur_id'] = $kelas->instruktur_id;
            }
            $validateData['kelas_acara_id'] = $request->kelas_acara_id;
            JadwalAcara::create($validateData);
        }
        return redirect('/koordinator/acara/jadwal-acara?acara_id=' . $request->acara_id)->with('success', 'Jadwal baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalAcara  $jadwalAcara
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalAcara $jadwalAcara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalAcara  $jadwalAcara
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalAcara $jadwalAcara, Request $request)
    {
        echo $request->acara_id;
        return view('dosen.koordinator.acara.jadwal.edit', [
            'title' => "Tambah Jadwal",
            'acara' => Acara::where('id', $request->acara_id)->first(),
            'list_instruktur' => Dosen::join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')
                ->where('acara_id', $request->acara_id)->with('user')
                ->get(),
            'list_kelas' => KelasAcara::where('acara_id', $request->acara_id)->get(),
            'list_status' => StatusJadwal::all(),
            'kelas' => KelasAcara::where('id', $jadwalAcara->kelas_acara_id)->first(),
            'jadwal' => $jadwalAcara
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalAcara  $jadwalAcara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalAcara $jadwalAcara)
    {
        $validateData = $request->validate([
            'instruktur_id' => 'required',
            'ruangan' => 'required',
            'link' => 'max:255',
            'materi' => 'required',
            'tanggal' => 'required',
            'waktu_dimulai' => 'required',
            'waktu_selesai' => 'required',
            'status_jadwal_id' => 'required',
            'keterangan' => 'required',
        ]);
        if ($request->ujian) {
            $validateData['is_ujian'] = $request->is_ujian;
        } else {
            $validateData['is_ujian'] = 0;
        }
        if ($request->kelas_acara_id = "all") {
            $list_kelas = KelasAcara::where('acara_id', $request->acara_id)->get();
            foreach ($list_kelas as $kelas) {
                if ($request->instruktur_id == 'each') {
                    $validateData['instruktur_id'] = $kelas->instruktur_id;
                }
                $validateData['kelas_acara_id'] = $kelas->id;
                JadwalAcara::where('id', $jadwalAcara->id)
                    ->update($validateData);
            }
        } else {
            $kelas = KelasAcara::where('id', $request->kelas_acara_id)->first();
            if ($request->instruktur_id == 'each') {
                $validateData['instruktur_id'] = $kelas->instruktur_id;
            }
            $validateData['kelas_acara_id'] = $request->kelas_acara_id;
            JadwalAcara::where('id', $jadwalAcara->id)
                ->update($validateData);
        }
        return redirect('/koordinator/acara/jadwal-acara?acara_id=' . $request->acara_id)->with('success', 'Jadwal baru telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalAcara  $jadwalAcara
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalAcara $jadwalAcara)
    {
        JadwalAcara::destroy($jadwalAcara->id);
        return back()->with('success', 'Jadwal  telah dihapus / dinonaktifkan!');
    }

    public function showBerita(BeritaAcara $beritaAcara)
    {
        return view('dosen.koordinator.acara.jadwal.berita-acara', [
            'title' => 'Sertifikasi | Invoice',
            'beritaAcara' => $beritaAcara,
            'list_presensi' => Presensi::where('berita_acara_id', $beritaAcara->id)->get(),
        ]);
    }
}
