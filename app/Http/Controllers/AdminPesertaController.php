<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pembayaran;
use App\Models\Peserta;
use App\Models\StatusPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPesertaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->acara_id) {
            $data['list_peserta'] = Peserta::where('acara_id', $request->acara_id)->get();
        } else {
            $data['list_peserta'] = Peserta::all();
        }
        $data['title'] = "Data Peserta";
        $data['list_status'] = StatusPeserta::all();

        return view('admin.peserta.index', $data);
    }

    public function ubahStatus(Request $request)
    {
        Peserta::where('id', $request->peserta_id)
            ->update([
                'status_peserta_id' => $request->status_peserta_id
            ]);
    }

    public function pembayaran(Request $request)
    {
        $data['title'] = "List Pembayaran";

        if ($request->peserta_id) {
            $data['list_pembayaran'] = Pembayaran::select('*', 'pembayaran.id AS id_pembayaran', 'peserta.id AS id_peserta', 'acara.id AS id_acara', 'pembayaran.is_valid AS validasi', 'acara.nama AS nama_acara', 'users.nama AS nama_peserta')
                ->where('peserta_id', $request->peserta_id)
                ->join('rekening', 'rekening.id', '=', 'pembayaran.rekening_tujuan_id')
                ->join('peserta', 'peserta.id', '=', 'pembayaran.peserta_id')
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')
                ->join('mahasiswa', 'mahasiswa.id', '=', 'peserta.mahasiswa_id')
                ->join('users', 'users.id', '=', 'mahasiswa.user_id')->get();
        } else {
            $data['list_pembayaran'] = Pembayaran::select('*', 'peserta.id AS id_peserta', 'acara.id AS id_acara', 'pembayaran.is_valid AS validasi', 'pembayaran.id AS id_pembayaran', 'acara.nama AS nama_acara', 'users.nama AS nama_peserta')
                ->join('rekening', 'rekening.id', '=', 'pembayaran.rekening_tujuan_id')
                ->join('peserta', 'peserta.id', '=', 'pembayaran.peserta_id')
                ->join('acara', 'acara.id', '=', 'peserta.acara_id')
                ->join('mahasiswa', 'mahasiswa.id', '=', 'peserta.mahasiswa_id')
                ->join('users', 'users.id', '=', 'mahasiswa.user_id')->get();
        }

        return view('admin.peserta.pembayaran', $data);
    }

    public function getPembayaranById(Request $request)
    {
        echo json_encode(Pembayaran::select('*', 'pembayaran.id AS id_pembayaran')
            ->join('peserta', 'peserta.id', '=', 'pembayaran.peserta_id')->where('pembayaran.id', $request->pembayaran_id)->first());
    }

    public function validasi(Request $request)
    {
        Pembayaran::where('id', $request->id)
            ->update([
                'is_valid' => $request->is_valid,
                'keterangan' => $request->keterangan
            ]);

        if ($request->is_valid == 1) {
            Peserta::where('id', $request->peserta_id)
                ->update([
                    'sisa_tagihan' => $request->sisa_tagihan
                ]);
        }
        return back()->with('success', 'Pembayaran berhasil divalidasi!');
    }
    public function berkasShow(Request $request)
    {
        return view('admin.peserta.berkas-show', [
            'mahasiswa' => Mahasiswa::find($request->id)
        ]);
    }
}
