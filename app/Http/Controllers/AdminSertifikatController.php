<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Acara;
use App\Models\Nilai;
use App\Models\Sertifikat;
use Illuminate\Http\Request;

class AdminSertifikatController extends Controller
{
    public function index()
    {
        return view('admin.sertifikat.index', [
            'title' => 'Sertifikasi | Sertifikat',
            'list_acara' => Acara::where('status_acara_id', 7)->get(),
        ]);
    }

    public function list(Acara $acara)
    {
        return view('admin.sertifikat.list', [
            'title' => 'Sertifikasi | List Peserta',
            'acara' => $acara,
            'list_nilai' => Nilai::select('nilai.*')
                ->join('peserta', 'peserta.id', '=', 'nilai.peserta_id')
                ->where('acara_id', $acara->id)
                ->get(),
        ]);
    }

    public function isTake(Request $request)
    {
        Nilai::where('id', $request->nilai_id)
            ->update(['is_take' => $request->is_take]);
    }
}
