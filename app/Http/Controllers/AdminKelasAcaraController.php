<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Dosen;
use App\Models\KelasAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKelasAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.acara.kelas.index', [
            'title' => "Data Instruktur",
            'acara' => Acara::where('id', $request->acara_id)->first(),
            'list_kelas' => KelasAcara::where('acara_id', $request->acara_id)->with(['instrukturAcara'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kuota = KelasAcara::select(DB::raw('SUM(kuota) as kuota_total'))->where('acara_id', $request->acara_id)->first()->kuota_total;
        $acara = Acara::where('id', $request->acara_id)->first();

        $sisa_kuota = $acara->kuota - $kuota;
        return view('admin.acara.kelas.create', [
            'title' => "Data Instruktur",
            'sisa_kuota' => $sisa_kuota,
            'list_instruktur' => Dosen::select('*', 'dosen.id AS instruktur_id')->join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')
                ->where('acara_id', $request->acara_id)->with('user')
                ->get(),
            'acara' => $acara
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
        if ($request->kuota > $request->sisa_kuota) {
            return back()->with('danger', 'Kuota tidak mencukupi!');
        }
        if ($request->kuota == 0) {
            return back()->with('danger', 'Kuota tidak boleh sama dengan 0');
        }
        $validateData = $request->validate([
            'acara_id' => 'required',
            'instruktur_id' => 'required',
            'nama' => 'required|max:255',
            'kuota' => 'required'
        ]);
        KelasAcara::create($validateData);
        return redirect('/dashboard/acara/kelas-acara?acara_id=' . $request->acara_id)->with('success', 'Kelas baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelasAcara  $kelasAcara
     * @return \Illuminate\Http\Response
     */
    public function show(KelasAcara $kelasAcara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelasAcara  $kelasAcara
     * @return \Illuminate\Http\Response
     */
    public function edit(KelasAcara $kelasAcara)
    {
        $acara = Acara::where('id', $kelasAcara->acara_id)->first();
        $kuota = KelasAcara::select(DB::raw('SUM(kuota) as kuota_total'))->where('acara_id', $kelasAcara->acara_id)->first()->kuota_total;

        $sisa_kuota = $acara->kuota - $kuota;
        return view('admin.acara.kelas.edit', [
            'title' => "Data Instruktur",
            'sisa_kuota' => $sisa_kuota,
            'acara' => $acara,
            'kelas' => $kelasAcara,
            'list_instruktur' => Dosen::select('*', 'dosen.id AS instruktur_id')->join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')
                ->where('acara_id', $kelasAcara->acara_id)->with('user')
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelasAcara  $kelasAcara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelasAcara $kelasAcara)
    {
        if ($request->kuota > $request->sisa_kuota) {
            return back()->with('danger', 'Kuota tidak mencukupi!');
        }
        if ($request->kuota == 0) {
            return back()->with('danger', 'Kuota tidak boleh sama dengan 0');
        }
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'kuota' => 'required',
            'instruktur_id' => 'required',
        ]);
        KelasAcara::where('id', $kelasAcara->id)
            ->update($validateData);
        return redirect('/dashboard/acara/kelas-acara?acara_id=' . $request->acara_id)->with('success', 'Data Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelasAcara  $kelasAcara
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelasAcara $kelasAcara)
    {
        KelasAcara::destroy($kelasAcara->id);
        return back()->with('success', 'Kelas  telah dihapus / dinonaktifkan!');
    }
}
