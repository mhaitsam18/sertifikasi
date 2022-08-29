@extends('dosen.layouts.main')
@section('container')
<?php 
use App\Models\Peserta;
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/instruktur">Instruktur</a></li>
                    {{-- <li class="breadcrumb-item"><a href="/dosen/instruktur">Instruktur</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Acara</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Instruktur | Daftar kelas {{ $acara->nama }}</h4>
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

    <div class="row">
        @if ($list_kelas->count())
            @foreach ($list_kelas as $kelas)
                <div class="col-md-4">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">Kelas {{ $kelas->nama }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Kuota: {{ $kelas->kuota }} | Jumlah anggota: {{ $kelas->jumlah_anggota }}</h6>
                            <p class="card-text">Instruktur: {{ $kelas->instruktur->kode_dosen }} | {{ $kelas->instruktur->user->nama }}</p>
                            <a href="/instruktur/jadwal/{{ $kelas->id }}" class="card-link">Lihat Jadwal</a>
                            <a href="/instruktur/peserta/{{ $kelas->id }}" class="card-link">Daftar Peserta</a>
                            <a href="/instruktur/berita-acara?kelas_acara_id={{ $kelas->id }}" class="card-link">List BAP</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="col-12">
            <div class="text-center">
                <h4 class="mb-1 mt-0">Tidak ditemukan</h4>
            </div>
        </div>
        @endif
                
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">List Materi</h4>
                        <table class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Materi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_materi as $materi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $materi->materi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    {{-- <div class="row mb-3 mt-2">
        <div class="col-12">
            <div class="text-center">
                <a href="javascript:void(0);" class="btn btn-white">
                    <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                    Load more
                </a>
            </div>
        </div> <!-- end col-->
    </div> --}}
    <!-- end row -->
@endsection