<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dosen.koordinator.acara.fasilitas.index', [
            'title' => "Data Fasilitas",
            'acara' => Acara::where('id', $request->acara_id)->first(),
            'list_fasilitas' => Fasilitas::where('acara_id', $request->acara_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dosen.koordinator.acara.fasilitas.create', [
            'title' => "Data Fasilitas",
            'acara' => Acara::where('id', $request->acara_id)->first()
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
            'acara_id' => 'required',
            'fasilitas' => 'required|max:255',
            'keterangan' => 'max:255'
        ]);
        Fasilitas::create($validateData);
        return redirect('/koordinator/acara/fasilitas?acara_id=' . $request->acara_id)->with('success', 'Fasilitas baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('dosen.koordinator.acara.fasilitas.edit', [
            'title' => "Data Fasilitas",
            'acara' => Acara::where('id', $fasilitas->acara_id)->first(),
            'fasilitas' => $fasilitas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $validateData = $request->validate([
            'fasilitas' => 'required|max:255',
            'keterangan' => 'max:255',
        ]);
        Fasilitas::where('id', $fasilitas->id)
            ->update($validateData);
        return redirect('/koordinator/acara/fasilitas?acara_id=' . $request->acara_id)->with('success', 'Data Fasilitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        Fasilitas::destroy($fasilitas->id);
        return back()->with('success', 'Fasilitas  telah dihapus!');
    }
}
