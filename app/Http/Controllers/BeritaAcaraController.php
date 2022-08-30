<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\BeritaAcara;
use App\Models\JadwalAcara;
use App\Models\KelasAcara;
use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;

class BeritaAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Sertifikasi | Invoice';
        $data['list_berita'] = BeritaAcara::select('berita_acara.*')
            ->where('kelas_acara_id', $request->kelas_acara_id)
            ->join('jadwal_acara', 'jadwal_acara.id', '=', 'berita_acara.jadwal_acara_id')
            ->get();
        $data['kelas'] = KelasAcara::where('id', $request->kelas_acara_id)->first();
        $data['acara'] = Acara::where('id', $data['kelas']->acara_id)->first();
        return view('dosen.instruktur.berita-acara.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(JadwalAcara $jadwalAcara)
    {
        return view('dosen.instruktur.berita-acara.create', [
            'title' => 'Sertifikasi | Jadwal Kelas',
            'acara' => Acara::where('id', $jadwalAcara->kelasAcara->acara_id)->first(),
            'kelas' => KelasAcara::where('id', $jadwalAcara->kelas_acara_id)->first(),
            'jadwal' => $jadwalAcara,
            'list_peserta' => Peserta::select('peserta.*')
                ->where([
                    'kelas_acara.id' => $jadwalAcara->kelasAcara->id,
                    // 'status_peserta_id' => 3
                ])
                ->join('kelas_acara', 'kelas_acara.id', '=', 'peserta.kelas_acara_id')
                ->get(),
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
            // 'acara_id' => 'required',
            'jadwal_acara_id' => 'required',
            'total_peserta' => 'required',
            'total_kehadiran' => 'required',
            'total_izin' => 'required',
            'total_alpa' => 'required',
            'catatan' => 'max:255'
        ]);

        $beritaAcara = BeritaAcara::create($validateData);
        foreach ($request->peserta_id as $key => $value) {
            if ($value) {
                Presensi::create([
                    'peserta_id' => $value,
                    'berita_acara_id' => $beritaAcara->id,
                    'is_present' => (isset($request->is_present[$key])) ? 1 : 0,
                    'keterangan' => (isset($request->keterangan[$key])) ? $request->keterangan[$key] : ''
                ]);
            }
        }

        return redirect("/instruktur/berita-acara/$beritaAcara->id")->with('success', 'Berita Acara Berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaAcara $beritaAcara)
    {
        return view('dosen.instruktur.berita-acara.show', [
            'title' => 'Sertifikasi | Invoice',
            'beritaAcara' => $beritaAcara,
            'list_presensi' => Presensi::where('berita_acara_id', $beritaAcara->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaAcara $beritaAcara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaAcara $beritaAcara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaAcara $beritaAcara)
    {
        //
    }
}
