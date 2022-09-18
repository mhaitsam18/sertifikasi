<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KomentarBerita;
use App\Models\LikeBerita;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.berita.index', [
            'title' => "Berita Saya",
            'list_berita' => Berita::where('penulis_id', auth()->user()->id)->get()
        ]);
    }

    public function hapusKomentar(KomentarBerita $komentarBerita, Request $request)
    {
        KomentarBerita::destroy($komentarBerita->id);
        return back()->with('success', 'Komentar dihapus!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create', [
            'title' => "Buat Berita"
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
            'judul' => 'required|max:255',
            'slug' => 'required|unique:berita',
            'thumbnail' => 'image|file|max:1024',
            'isi' => 'required',
        ]);

        if ($request->file('thumbnail')) {
            $validateData['thumbnail'] = $request->file('thumbnail')->store('thumbnail-berita');
        }
        $validateData['penulis_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->isi), 200, '...');
        if ($request->publish_at) {
            $validateData['publish_at'] = now();
        }
        $berita = Berita::create($validateData);
        Notifikasi::create([
            'user_id' => null,
            'kategori_notifikasi_id' => 6,
            'sub_id' => $berita->id,
            'subjek' => "Berita Baru",
            'pesan' => $request->judul,
            'is_read' => 0,
            'creator_id' => auth()->user()->id,
        ]);
        return redirect('/dashboard/berita')->with('success', 'Berita baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        // dd($berita);
        return view('admin.berita.show', [
            'title' => "Berita Saya",
            'like_berita' => LikeBerita::where('berita_id', $berita->id)->count(),
            'list_komentar' => KomentarBerita::where('berita_id', $berita->id)->get(),
            'like' => LikeBerita::where([
                'berita_id' => $berita->id,
                'user_id' => auth()->user()->id,
            ])->first(),
            'berita' => $berita
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', [
            'title' => "Edit Berita",
            'berita' => $berita
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $rules = [
            'judul' => 'required|max:255',
            'thumbnail' => 'image|file|max:1024',
            'isi' => 'required',
        ];
        if ($request->slug != $berita->slug) {
            $rules['slug'] = 'required|unique:berita';
        }
        $validateData = $request->validate($rules);
        $validateData['penulis_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->isi), 200, '...');
        if ($request->file('thumbnail')) {
            if ($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validateData['thumbnail'] = $request->file('thumbnail')->store('thumbnail-berita');
        }
        if ($request->publish_at) {
            $validateData['publish_at'] = now();
        }
        Berita::where('id', $berita->id)
            ->update($validateData);
        return redirect('/dashboard/berita')->with('success', 'Berita telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        // if ($berita->image) {
        //     Storage::delete($berita->image);
        // }
        Berita::destroy($berita->id);
        return redirect('/dashboard/berita')->with('success', 'Berita telah dihapus / dinonaktifkan!');
    }

    public function restore(Request $request)
    {
        // if ($berita->image) {
        //     Storage::delete($berita->image);
        // }
        Berita::where('id', $request->id)->restore();
        return redirect('/dashboard/berita')->with('success', 'Berita telah dipulihkan / diaktifkan!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function publish(Berita $berita)
    {
        Berita::where('id', $berita->id)
            ->update(['publish_at' => now()]);
        return redirect('/dashboard/berita')->with('success', 'Berita telah dipublish!');
    }

    public function takedown(Berita $berita)
    {
        Berita::where('id', $berita->id)
            ->update(['publish_at' => null]);
        return redirect('/dashboard/berita')->with('success', 'Berita telah ditakedown!');
    }
}
