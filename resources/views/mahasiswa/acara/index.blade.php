@extends('mahasiswa.layouts.main')

@section('container')
<?php 
    use Illuminate\Support\Carbon;
?>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
{{-- <link href="/css/blog.css" rel="stylesheet"> --}}
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event }}</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">{{ $event }}</h4>
    </div>
</div>
@if ($list_acara->count())
    <div class="row page-title align-items-center">
        <div class="row mb-2">
            @foreach ($list_acara as $acara)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-{{ ($acara->kategori_acara_id == 1) ? "primary" : "success" }}">{{ $acara->kategoriAcara->kategori }}</strong>
                        <h3 class="mb-0">{{ $acara->nama }}</h3>
                        @if ($acara->status_acara_id == 1)
                            <div class="mb-1 text-muted">Pendaftaran dibuka: {{ Carbon::parse($acara->pendaftaran_buka)->translatedFormat('d F Y') }}</div>
                        @elseif ($acara->status_acara_id == 2)
                            <div class="mb-1 text-muted">Pendaftaran ditutup: {{ Carbon::parse($acara->pendaftaran_tutup)->translatedFormat('d F Y') }}</div>
                        @elseif ($acara->status_acara_id == 3)
                            <div class="mb-1 text-muted">Acara dibatalkan, Menunggu Informasi Lanjut</div>
                        @elseif ($acara->status_acara_id == 4)
                            <div class="mb-1 text-muted">Acara diundur, Menunggu Informasi Lanjut</div>
                        @elseif ($acara->status_acara_id == 5)
                            <div class="mb-1 text-muted">Acara dimulai: {{ Carbon::parse($acara->pelaksanaan_buka)->translatedFormat('d F Y') }}</div>
                        @elseif ($acara->status_acara_id == 6)
                            <div class="mb-1 text-muted">Sedang berlangsung Hingga: {{ Carbon::parse($acara->pelaksanaan_tutup)->translatedFormat('d F Y') }}</div>
                        @elseif ($acara->status_acara_id == 7)
                            <div class="mb-1 text-muted">Acara sudah selesai</div>
                        
                        @endif
                        <p class="card-text mb-auto">{{ Str::limit(strip_tags($acara->deskripsi), 200, '...') }}</p>
                        <a href="/acara/{{ $acara->id }}" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ asset("storage/$acara->thumbnail") }}" class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg> --}}

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-end">
            {{ $list_acara->links() }}
        </div>
    </div>
@else
    <div class="mb-2 text-center fs-24 justify-content-center">
        <h2>Data Tidak ditemukan</h2>
    </div>
@endif
<!-- end row -->
@endsection