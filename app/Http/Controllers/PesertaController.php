<?php

namespace App\Http\Controllers;

use App\Models\JadwalAcara;
use App\Models\KelasAcara;
use App\Models\Notifikasi;
use App\Models\Pembayaran;
use App\Models\Peserta;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            // 'acara_id' => 'required',
            'mahasiswa_id' => 'required',
            'acara_id' => 'required',
            'tagihan' => 'required'
        ]);
        $validateData['sisa_tagihan'] = $validateData['tagihan'];
        $peserta = Peserta::create($validateData);

        Notifikasi::create([
            'kategori_notifikasi_id' => 2,
            'sub_id' => $peserta->id,
            'subjek' => "Peserta Baru",
            'pesan' => "Acara " . $peserta->acara->kategoriAcara->kategori . ": " . $peserta->acara->nama,
            'is_read' => 0,
            'creator_id' => auth()->user()->id
        ]);
        return back()->with('success', 'Selamat, Anda berhasil bergabung!');
    }

    public function showInvoice(Peserta $peserta)
    {
        return view('mahasiswa.peserta.invoice', [
            'title' => 'Sertifikasi | Invoice',
            'peserta' => $peserta,
        ]);
    }

    public function bayar(Request $request)
    {
        return view('mahasiswa.peserta.bayar', [
            'title' => 'Sertifikasi | Bayar',
            'list_rekening' => Rekening::all(),
            'peserta' => Peserta::where('id', $request->peserta_id)->first(),
        ]);
    }
    public function storeBayar(Request $request)
    {
        $validateData = $request->validate([
            'peserta_id' => 'required',
            'rekening_tujuan_id' => 'required',
            'rekening_pengirim' => 'required',
            'bank_pengirim' => 'required',
            'nama_pengirim' => 'required',
            'nominal_transfer' => 'required',
            'bukti' => 'file|required',
            'catatan' => 'max:255',
        ]);
        if ($request->file('bukti')) {
            $validateData['bukti'] = $request->file('bukti')->store('bukti-transfer');
        }
        $validateData['waktu_transfer'] = $request->tanggal_transfer . ' ' . $request->waktu_transfer;
        $pembayaran = Pembayaran::create($validateData);

        Notifikasi::create([
            'kategori_notifikasi_id' => 3,
            'sub_id' => $pembayaran->id,
            'subjek' => "Pembayaran Masuk",
            'pesan' => "Pembayaran sebesar Rp." . number_format($pembayaran->nominal_transfer, 2, ',', '.') . " masuk",
            'is_read' => 0,
            'creator_id' => auth()->user()->id
        ]);
        return redirect('/peserta/pembayaran')->with('success', 'Bukti Transfer Terkirim!');
    }

    public function pembayaran()
    {
        return view('mahasiswa.pembayaran.index', [
            'title' => 'Sertifikasi | List Pembayaran',
            'list_pembayaran' => Pembayaran::select('*', 'peserta.id AS id_peserta', 'acara.id AS id_acara', 'pembayaran.is_valid AS validasi')
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))
                ->join('rekening', 'rekening.id', '=', 'pembayaran.rekening_tujuan_id')
                ->join('peserta', 'peserta.id', '=', 'pembayaran.peserta_id')
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')->get()
        ]);
    }
    public function invoice()
    {
        return view('mahasiswa.invoice.index', [
            'title' => 'Sertifikasi | Data Tagihan',
            'list_invoice' => Peserta::where('mahasiswa_id', session()->get('mahasiswa_id'))->get()
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $peserta)
    {
        //
    }

    public function kelas(KelasAcara $kelasAcara)
    {
        return view('mahasiswa.peserta.kelas', [
            'title' => 'Sertifikasi | Data Tagihan',
            'kelas' => $kelasAcara,
            'list_jadwal' => JadwalAcara::where('kelas_acara_id', $kelasAcara->id)->get(),
        ]);
    }

    public function histori()
    {
        return view('mahasiswa.peserta.histori', [
            'title' => 'Sertifikasi | Data Tagihan',
            'list_pelatihan' => Peserta::select('peserta.*')
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')
                ->where('acara.kategori_acara_id', 2)
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))
                ->with('acara', 'nilai')->get(),
            'list_sertifikasi' => Peserta::select('peserta.*')
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')
                ->where('acara.kategori_acara_id', 1)
                ->where('mahasiswa_id', session()->get('mahasiswa_id'))
                ->with('acara', 'nilai')->get(),
        ]);
    }
}
