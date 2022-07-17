<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Nilai;
use App\Models\Peserta;
use App\Models\Berita;
use App\Models\StatusPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dosen.acara.nilai.index', [
            'title' => 'Sertifikasi | Nilai dan Sertifikat',
            'acara' => Acara::where('id', $request->acara_id)->first(),
            'list_status' => StatusPeserta::all(),
            'list_nilai' => Nilai::select('nilai.*')
                ->join('peserta', 'peserta.id', '=', 'nilai.peserta_id')
                ->where([
                    'peserta.acara_id' => $request->acara_id,
                ])->with(['peserta'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nilai::create([
            'peserta_id' => $request->peserta_id,
            'nilai' => $request->nilai,
            // 'sertifikat' => $request->sertifikat,
        ]);
        return back()->with('success', 'Nilai telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $validateData = $request->validate([
            'nilai' => 'max:100',
            'sertifikat' => 'file'
        ]);

        if ($request->file('sertifikat')) {
            $slug = SlugService::createSlug(Berita::class, 'slug', $nilai->peserta->acara->nama);
            $extension = $request->file('sertifikat')->getClientOriginalExtension();
            $validateData['sertifikat'] = $request->file('sertifikat')->storeAs('sertifikat', $nilai->peserta->mahasiswa->nim . '_' . $slug . $extension);
        }
        Nilai::where('id', $nilai->id)
            ->update($validateData);
        return back()->with('success', 'Nilai / Sertifikat telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
