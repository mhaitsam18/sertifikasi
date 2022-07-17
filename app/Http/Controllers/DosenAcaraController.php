<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Dosen;
use App\Models\Fasilitas;
use App\Models\InstrukturAcara;
use App\Models\JadwalAcara;
use App\Models\KategoriAcara;
use App\Models\KelasAcara;
use App\Models\Peserta;
use App\Models\Rating;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dosen.acara.index', [
            'title' => "Master Pelatihan dan Sertifikasi",
            'list_acara' => Acara::withTrashed()->where('koordinator_id', session()->get('dosen_id'))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.acara.create', [
            'title' => "Tambah Acara",
            'list_kategori_acara' => KategoriAcara::all()
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'kategori_acara_id' => 'required',
            'lokasi' => 'required',
            'biaya' => 'required',
            'kuota' => 'required',
            'thumbnail' => 'image|file|max:1024'
        ]);

        if ($request->file('thumbnail')) {
            $validateData['thumbnail'] = $request->file('thumbnail')->store('thumbnail-acara');
        }
        $validateData['pendaftaran_buka'] = $request->tanggal_pendaftaran_buka . ' ' . $request->waktu_pendaftaran_buka;
        $validateData['pendaftaran_tutup'] = $request->tanggal_pendaftaran_tutup . ' ' . $request->waktu_pendaftaran_tutup;
        $validateData['pelaksanaan_buka'] = $request->tanggal_pelaksanaan_buka . ' ' . $request->waktu_pelaksanaan_buka;
        $validateData['pelaksanaan_tutup'] = $request->tanggal_pelaksanaan_tutup . ' ' . $request->waktu_pelaksanaan_tutup;
        $validateData['koordinator_id'] = session()->get('dosen_id');
        $validateData['biaya'] = str_replace(['Rp.', '.', ' '], '', $request->biaya);
        $validateData['status_acara_id'] = 1;
        Acara::create($validateData);
        return redirect('/dosen/acara')->with('success', 'Acara baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        return view('dosen.acara.show', [
            'title' => "Detail Acara",
            'acara' => $acara,
            'list_rating' => Rating::where('acara_id', $acara->id)->get(),
            'rating_acara' => Rating::where('acara_id', $acara->id)->avg('rating'),
            'list_fasilitas' => Fasilitas::where('acara_id', $acara->id)->get(),
            'list_acara' => Acara::where('koordinator_id', session()->get('dosen_id'))->latest()->get(),
            'list_instruktur' => Dosen::join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')
                ->where('acara_id', $acara->id)->with('user')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        return view('dosen.acara.edit', [
            'title' => "Edit Acara",
            'acara' => $acara,
            'list_kategori_acara' => KategoriAcara::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'kategori_acara_id' => 'required',
            'lokasi' => 'required',
            'biaya' => 'required',
            'kuota' => 'required',
            'thumbnail' => 'image|file|max:1024'
        ]);

        if ($request->file('thumbnail')) {
            if ($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validateData['thumbnail'] = $request->file('thumbnail')->store('thumbnail-acara');
        }
        $validateData['pendaftaran_buka'] = $request->tanggal_pendaftaran_buka . ' ' . $request->waktu_pendaftaran_buka;
        $validateData['pendaftaran_tutup'] = $request->tanggal_pendaftaran_tutup . ' ' . $request->waktu_pendaftaran_tutup;
        $validateData['pelaksanaan_buka'] = $request->tanggal_pelaksanaan_buka . ' ' . $request->waktu_pelaksanaan_buka;
        $validateData['pelaksanaan_tutup'] = $request->tanggal_pelaksanaan_tutup . ' ' . $request->waktu_pelaksanaan_tutup;
        $validateData['koordinator_id'] = session()->get('dosen_id');
        $validateData['biaya'] = str_replace(['Rp.', '.', ' '], '', $request->biaya);
        $validateData['status_acara_id'] = 1;
        Acara::where('id', $acara->id)
            ->update($validateData);
        return redirect('/dosen/acara')->with('success', 'Data Acara berhasil diperbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        Acara::destroy($acara->id);
        return redirect('/dosen/acara')->with('success', 'Acara telah dihapus / dinonaktifkan!');
    }

    public function restore(Request $request)
    {
        Acara::where('id', $request->id)->restore();
        return redirect('/dosen/acara')->with('success', 'Acara telah dipulihkan / diaktifkan!');
    }

    public function instruktur(Acara $acara)
    {
        return view('dosen.acara.instruktur', [
            'title' => "Data Instruktur",
            'acara' => $acara,
            'list_instruktur' => Dosen::join('instruktur_acara', 'dosen.id', '=', 'instruktur_acara.dosen_id')->where('acara_id', $acara->id)->with('user')->get(),
            'list_dosen' => DB::select("SELECT *, dosen.id AS dosen_id FROM dosen JOIN users ON users.id=dosen.user_id WHERE dosen.id NOT IN (SELECT dosen_id FROM instruktur_acara WHERE acara_id = $acara->id)")
        ]);
    }

    public function hapusInstruktur(Request $request)
    {
        InstrukturAcara::where([
            'acara_id' => $request->acara_id,
            'dosen_id' => $request->dosen_id
        ])->delete();
        return back()->with('success', 'Instruktur Telah dihapus');
    }
    public function tambahInstruktur(Request $request)
    {
        InstrukturAcara::create([
            'acara_id' => $request->acara_id,
            'dosen_id' => $request->dosen_id
        ]);
        return back()->with('success', 'Instruktur Telah ditambahkan');
    }

    public function peserta(Acara $acara)
    {
        return view('dosen.acara.peserta.index', [
            'title' => "Sertifikasi | Peserta Pelatihan / Sertifikasi",
            'list_peserta' => Peserta::where('acara_id', $acara->id)->get(),
            'list_kelas' => KelasAcara::where('acara_id', $acara->id)->get(),
            'acara' => $acara
        ]);
    }

    public function ubahKelasPeserta(Request $request)
    {
        Peserta::where('id', $request->peserta_id)
            ->update([
                'kelas_acara_id' => $request->kelas_acara_id
            ]);
    }

    public function ubahStatusPeserta(Request $request)
    {
        Peserta::where('id', $request->peserta_id)
            ->update([
                'status_peserta_id' => $request->status_peserta_id
            ]);
    }
}
