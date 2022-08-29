<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Fasilitas;
use App\Models\Rating;
use App\Models\StatusAcara;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class AdminAcaraController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.acara.index', [
            'title' => "Validasi Pelatihan & Sertifikasi Telkom University",
            'list_acara' => Acara::withTrashed()->get(),
            'list_status' => StatusAcara::all(),
        ]);
    }

    public function validasi(Request $request)
    {
        $pesan = "";
        if ($request->validasi == 1) {
            Acara::where('id', $request->acara_id)
                ->update(['is_valid' => $request->validasi]);
            $pesan = 'Acara dinyatakan Valid!';
        } else {
            Acara::where('id', $request->acara_id)
                ->update([
                    'is_valid' => $request->validasi,
                    'status_acara_id' => 3
                ]);
            $pesan = 'Acara dinyatakan Tidak Valid!';
        }
        return redirect('/dashboard/acara')->with('success', $pesan);
    }

    public function ubahStatus(Request $request)
    {
        Acara::where('id', $request->acara_id)
            ->update([
                'status_acara_id' => $request->status_acara_id
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        return view('admin.acara.show', [
            'title' => "Acara Saya",
            'acara' => $acara,
            'list_rating' => Rating::where('acara_id', $acara->id)->get(),
            'rating_acara' => Rating::where('acara_id', $acara->id)->avg('rating'),
            'list_fasilitas' => Fasilitas::where('acara_id', $acara->id)->get(),
            // 'acara' => Acara::where('id', $acara->id)->with(['koordinator', 'statusAcara'])->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        //
    }
}
