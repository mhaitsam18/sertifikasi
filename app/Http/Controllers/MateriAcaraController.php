<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dosen.acara.materi.index', [
            'title' => "Data Instruktur",
            'acara' => Acara::where('id', $request->acara_id)->first(),
            'list_materi' => Materi::where('acara_id', $request->acara_id)->with(['acara'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dosen.acara.materi.create', [
            'title' => "Data Instruktur",
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
            'materi' => 'required|max:255'
        ]);
        Materi::create($validateData);
        return redirect('/dosen/materi?acara_id=' . $request->acara_id)->with('success', 'Materi baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        return view('dosen.acara.materi.edit', [
            'title' => "Data Instruktur",
            'acara' => Acara::where('id', $materi->acara_id)->first(),
            'materi' => $materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('dosen.acara.materi.edit', [
            'title' => "Data Instruktur",
            'acara' => Acara::where('id', $materi->acara_id)->first(),
            'materi' => $materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $validateData = $request->validate([
            'materi' => 'required|max:255',
        ]);
        Materi::where('id', $materi->id)
            ->update($validateData);
        return redirect('/dosen/materi?acara_id=' . $request->acara_id)->with('success', 'Data Materi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);
        return back()->with('success', 'Materi  telah dihapus / dinonaktifkan!');
    }
}
