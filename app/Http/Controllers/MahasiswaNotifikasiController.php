<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriNotifikasi;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MahasiswaNotifikasiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->kategori_notifikasi_id) {
            $notifikasi_today = Notifikasi::where(function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->orWhere('user_id', null);
            })->where('kategori_notifikasi_id', $request->kategori_notifikasi_id)
                ->where(function ($query) use ($request) {
                    $query->where("subjek", "like", "%" . $request->search . "%")
                        ->orWhere("pesan", "like", "%" . $request->search . "%");
                })
                ->whereDate('created_at', Carbon::today())
                ->latest()->get();
            $notifikasi_other = Notifikasi::where(function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->orWhere('user_id', null);
            })->where('kategori_notifikasi_id', $request->kategori_notifikasi_id)
                ->where(function ($query) use ($request) {
                    $query->where("subjek", "like", "%" . $request->search . "%")
                        ->orWhere("pesan", "like", "%" . $request->search . "%");
                })
                ->whereDate('created_at', '!=', Carbon::today())
                ->latest()->get();
        } else {
            $notifikasi_today = Notifikasi::where(function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->orWhere('user_id', null);
            })->where(function ($query) use ($request) {
                $query->where("subjek", "like", "%" . $request->search . "%")
                    ->orWhere("pesan", "like", "%" . $request->search . "%");
            })
                ->whereDate('created_at', Carbon::today())
                ->whereIn('kategori_notifikasi_id', [4, 5, 6])
                ->latest()->get();
            $notifikasi_other = Notifikasi::where(function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->orWhere('user_id', null);
            })->where(function ($query) use ($request) {
                $query->where("subjek", "like", "%" . $request->search . "%")
                    ->orWhere("pesan", "like", "%" . $request->search . "%");
            })
                ->whereDate('created_at', '!=', Carbon::today())
                ->whereIn('kategori_notifikasi_id', [4, 5, 6])
                ->latest()->get();
        }
        return view("mahasiswa.notifikasi.index", [
            'title' => 'Sertifikasi | Notifikasi',
            "notifikasi_today" => $notifikasi_today,
            "notifikasi_other" => $notifikasi_other,
            "data_kategori_notifikasi" => KategoriNotifikasi::where("role_id", auth()->user()->role_id)->get()
        ]);
    }

    public function read()
    {
        Notifikasi::where('user_id', auth()->user()->id)->update(['is_read' => 1]);
        return back();
    }
    public function clear()
    {
        Notifikasi::where('user_id', auth()->user()->id)->delete();
        return "";
    }

    public function show(Notifikasi $notifikasi)
    {
        if ($notifikasi->kategori_notifikasi_id == 4) {
            $url = "/mahasiswa/acara/$notifikasi->sub_id";
        } elseif ($notifikasi->kategori_notifikasi_id == 5) {
            $url = "/peserta/histori";
        } elseif ($notifikasi->kategori_notifikasi_id == 6) {
            $slug = Berita::find($notifikasi->sub_id)->slug;
            $url = "/mahasiswa/berita/$slug";
        }
        return redirect($url);
    }
}
