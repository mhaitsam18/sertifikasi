<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Dosen;
use App\Models\Fasilitas;
use App\Models\KelasAcara;
use App\Models\Mahasiswa;
use App\Models\Peserta;
use App\Models\Rating;
use Illuminate\Http\Request;

class MahasiswaAcaraController extends Controller
{

    public function index(Request $request)
    {
        return view('mahasiswa.acara.index', [
            'title' => 'Sertifikasi | Halaman Acara',
            'event' => 'Acara',
            'list_acara' => Acara::where('is_valid', 1)->where('nama', 'like', '%' . $request->search . '%')->whereNotIn('status_acara_id', [7])->latest()->paginate(8)->withQueryString(),
        ]);
    }

    public function diikuti()
    {
        return view('mahasiswa.acara.index', [
            'title' => 'Sertifikasi | Halaman Acara yang sedang diikuti',
            'event' => 'Acara yang sedang diikuti',
            'list_acara' => Acara::select('acara.*')->where(['is_valid' => 1, 'mahasiswa_id' => session()->get('mahasiswa_id')])->join('peserta', 'acara.id', '=', 'peserta.acara_id')->whereNotIn('status_acara_id', [7])->paginate(8)->withQueryString(),
        ]);
    }

    public function show(Acara $acara)
    {
        $peserta = Peserta::where(['mahasiswa_id' => session()->get('mahasiswa_id'), 'acara_id' => $acara->id])->first();
        $data['title'] = 'Sertifikasi | ' . $acara->nama;
        $data['acara'] = $acara;
        if ($peserta) {
            $data['rating'] = Rating::where('peserta_id', $peserta->id)->first();
        } else {
            $data['rating'] = null;
        }
        $data['list_rating'] = Rating::where('acara_id', $acara->id)->get();
        $data['list_kelas'] = KelasAcara::where('acara_id', $acara->id)->get();
        $data['rating_acara'] = Rating::where('acara_id', $acara->id)->avg('rating');
        $data['list_fasilitas'] = Fasilitas::where('acara_id', $acara->id)->get();
        $data['peserta'] = $peserta;
        $data['mahasiswa'] = Mahasiswa::where(['id' => session()->get('mahasiswa_id')])->first();
        $data['list_acara'] = Acara::where('is_valid', 1)->latest()->limit(10)->get();
        $data['list_instruktur'] = Dosen::join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')
            ->where('acara_id', $acara->id)->with('user')->get();

        return view('mahasiswa.acara.show', $data);
    }

    public function rateCreate(Request $request)
    {
        $data = [
            'peserta_id' => $request->peserta_id,
            'acara_id' => $request->acara_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ];
        Rating::create($data);
        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    public function rateUpdate(Request $request, Rating $rating)
    {
        $data = [
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ];
        Rating::where('id', $rating->id)->update($data);
        return back()->with('success', 'Komentar berhasil diubah!');
    }
}
