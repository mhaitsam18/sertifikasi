@extends('dosen.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title d-print-none">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/instruktur">Instruktur</a></li>
                    @if ($acara)
                        <li class="breadcrumb-item"><a href="/instruktur/acara/{{ $acara->id }}">Acara</a></li>
                    @endif
                    {{-- <li class="breadcrumb-item"><a href="/dosen/instruktur">Instruktur</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">BAP</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Berita Acara | Kelas {{ $kelas->nama }} | </h4>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger col-lg-12" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title mt-0">List Berita Acara</h4>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Jadwal Kelas</th>
                            <th scope="col">Peserta</th>
                            <th scope="col">Kehadiran</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Alpa</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($list_berita as $berita)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $berita->jadwalAcara->kelasAcara->nama }}</td>
                                    <td>{{ $berita->jadwalAcara->materi }}</td>
                                    <td>{{ Carbon::parse($berita->jadwalAcara->tanggal)->translatedFormat('d F Y').' '.$berita->jadwalAcara->waktu_dimulai.' s/d '.$berita->jadwalAcara->waktu_selesai }}</td>
                                    <td>{{ $berita->total_peserta }}</td>
                                    <td>{{ $berita->total_kehadiran }}</td>
                                    <td>{{ $berita->total_izin }}</td>
                                    <td>{{ $berita->total_alpa }}</td>
                                    <td>
                                        <a href="/berita-acara/{{ $berita->id }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
@endsection
