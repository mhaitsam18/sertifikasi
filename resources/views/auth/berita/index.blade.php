@extends('auth.layouts.home')

@section('container')
<?php 
    use Illuminate\Support\Carbon;
?>
<div class="container marketing">
    <h2 class="mt-3">{{ $title }}</h2>
    <a href="javascript:window.history.go(-1)" class="btn btn-success mb-2"><span data-feather="arrow-left"></span> Kembali</a>
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
                                <a href="/home/berita/{{ $berita->slug }}" class="stretched-link">Continue reading</a>
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
</div>
<!-- end row -->
@endsection