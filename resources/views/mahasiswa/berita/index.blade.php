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
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Berita</h4>
    </div>
</div>
<div class="row page-title align-items-center">
    @if ($list_berita->count())
        <div class="row mb-2">
            @foreach ($list_berita as $berita)
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-info">Berita</strong>
                            <h3 class="mb-0">{{ $berita->judul }}</h3>
                            <div class="mb-1 text-muted">diterbitkan pada: {{ Carbon::parse($berita->publish_at)->translatedFormat('d/m/Y') }}</div>
                            <p class="card-text mb-auto">{{ $berita->excerpt }}</p>
                            <a href="/berita/{{ $berita->slug }}" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="{{ asset("storage/$berita->thumbnail") }}" class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row mb-2 text-center fs-4">
            Berita tidak ditemukan
        </div>
    @endif
    <div class="row justify-content-end">
        {{ $list_berita->links() }}
    </div>
</div>
<!-- end row -->
@endsection