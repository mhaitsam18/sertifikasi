<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Nilai;
use App\Models\StatusPeserta;
use Illuminate\Http\Request;

class KoordinatorNilaiController extends Controller
{
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
}
