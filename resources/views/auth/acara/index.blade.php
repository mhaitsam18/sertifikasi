@extends('auth.layouts.home')

@section('container')
<?php 
    use Illuminate\Support\Carbon;
?>
<div class="container marketing">
    <h2 class="mt-3">{{ $title }}</h2>
    <a href="javascript:window.history.go(-1)" class="btn btn-success mb-2"><span data-feather="arrow-left"></span> Kembali</a>
    <div class="row page-title align-items-center">
        @if ($list_acara->count())
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
        @else
            <div class="row mb-2 text-center fs-4">
                Acara tidak ditemukan
            </div>
        @endif
        <div class="row justify-content-end">
            {{ $list_acara->links() }}
        </div>
    </div>
</div>

<!-- end row -->
@endsection