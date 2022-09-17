<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Keahlian;
use Illuminate\Http\Request;

class AdminKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.dosen.keahlian.index', [
            'title' => 'Keahlian Dosen',
            'dosen' => Dosen::find($request->dosen_id),
            'data_keahlian' => Keahlian::where('dosen_id', $request->dosen_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.dosen.keahlian.create', [
            'title' => 'Tambah Keahlian Dosen',
            'dosen' => Dosen::find($request->dosen_id),
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
            'dosen_id' => 'max:255',
            'keahlian' => 'required|max:255',
            'sertifikat' => 'file|max:100000',
        ]);

        if ($request->file('sertifikat')) {
            $validateData['sertifikat'] = $request->file('sertifikat')->store('sertifikat-keahlian');
        }
        Keahlian::create($validateData);
        return redirect('/dashboard/dosen/keahlian?dosen_id=' . $request->dosen_id)->with('success', 'Keahlian baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function show(Keahlian $keahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function edit(Keahlian $keahlian)
    {
        return view('admin.dosen.keahlian.edit', [
            'title' => 'Edit Keahlian Dosen',
            'keahlian' => $keahlian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keahlian $keahlian)
    {
        $validateData = $request->validate([
            'dosen_id' => 'max:255',
            'keahlian' => 'required|max:255',
            'sertifikat' => 'file|max:100000',
        ]);

        if ($request->file('sertifikat')) {
            $validateData['sertifikat'] = $request->file('sertifikat')->store('sertifikat-keahlian');
        }
        Keahlian::where('id', $keahlian->id)
            ->update($validateData);
        return redirect('/dashboard/dosen/keahlian?dosen_id=' . $request->dosen_id)->with('success', 'Keahlian telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keahlian $keahlian)
    {
        Keahlian::destroy($keahlian->id);
        return back()->with('success', 'Keahlian telah dihapus!');
    }
}
