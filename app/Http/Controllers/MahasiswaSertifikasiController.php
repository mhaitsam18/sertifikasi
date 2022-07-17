<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class MahasiswaSertifikasiController extends Controller
{
    public function index()
    {
        return view('mahasiswa.acara.index', [
            'title' => 'Sertifikasi | Halaman Acara',
            'event' => 'Sertifikasi',
            'list_acara' => Acara::where(['kategori_acara_id' => 1, 'is_valid' => 1])->whereNotIn('status_acara_id', [7])->latest()->paginate(8)->withQueryString(),
        ]);
    }
}
