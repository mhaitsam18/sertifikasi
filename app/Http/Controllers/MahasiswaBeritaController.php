<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KomentarBerita;
use App\Models\LikeBerita;

class MahasiswaBeritaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.berita.index', [
            'title' => 'Sertifikasi | Halaman Berita',
            'list_berita' => Berita::whereNotNull('publish_at')->latest()->paginate(8)->withQueryString(),
        ]);
    }

    public function show(Berita $berita) //, Request $request
    {
        // dd($request->ip());
        Berita::where('id', $berita->id)
            ->update(['views' => $berita->views + 1]);
        return view('mahasiswa.berita.show', [
            'title' => 'Sertifikasi | ' . $berita->judul,
            'berita' => $berita,
            'list_berita' => Berita::whereNotNull('publish_at')->latest()->limit(10)->get(),
            'like_berita' => LikeBerita::where('berita_id', $berita->id)->count(),
            'list_komentar' => KomentarBerita::where('berita_id', $berita->id)->get(),
            'like' => LikeBerita::where([
                'berita_id' => $berita->id,
                'user_id' => auth()->user()->id,
            ])->first(),
        ]);
    }

    public function like(Request $request)
    {
        $like = LikeBerita::where([
            'berita_id' => $request->berita_id,
            'user_id' => auth()->user()->id,
        ])->first();
        if ($like) {
            LikeBerita::where([
                'berita_id' => $request->berita_id,
                'user_id' => auth()->user()->id,
            ])->delete($request->berita_id);
        } else {
            LikeBerita::create([
                'berita_id' => $request->berita_id,
                'user_id' => auth()->user()->id,
            ]);
        }
    }

    public function komentar(Request $request)
    {
        KomentarBerita::create([
            'berita_id' => $request->berita_id,
            'user_id' => $request->user_id,
            'komentar' => $request->komentar,
        ]);
        return back()->with('success', 'Komentar Terkirim');
    }
}
