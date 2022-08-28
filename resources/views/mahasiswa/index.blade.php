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
<div class="row page-title align-items-center">
    <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0">Dashboard</h4>
    </div>
    <div class="col-sm-8 col-xl-6">
        {{-- <form class="form-inline float-sm-right mt-3 mt-sm-0">
            <div class="form-group mb-sm-0 mr-2">
                <input type="text" class="form-control" id="dash-daterange" style="min-width: 190px;" />
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Download
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                        <span>Email</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Print</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                        <span>Re-Generate</span>
                    </a>
                </div>
            </div>
        </form> --}}
    </div>
</div>

<!-- content -->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Tagihan</span>
                        @if ($tagihan)
                            <h2 class="mb-0">Rp.{{ number_format($tagihan->total_tagihan,2,',','.') }}</h2>
                        @else
                            <h2 class="mb-0">Rp.{{ number_format(0,2,',','.') }}</h2>
                        @endif
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-revenue-chart" class="apex-charts"></div>
                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 10.21%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Sertifikat</span>
                        @if ($nilai && $sertifikat)
                            <h2 class="mb-0">{{ $sertifikat->jumlah + $nilai->jumlah }}</h2>
                        @elseif ($nilai)
                            <h2 class="mb-0">{{ $nilai->jumlah }}</h2>
                        @elseif ($sertifikat)
                            <h2 class="mb-0">{{ $sertifikat->jumlah }}</h2>
                        @else
                            <h2 class="mb-0">0</h2>
                        @endif
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-product-sold-chart" class="apex-charts"></div>
                        <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Pelatihan yang sedang diikuti</span>
                        @if ($pelatihan)
                            <h2 class="mb-0">{{ $pelatihan->jumlah }}</h2>
                        @else
                            <h2 class="mb-0">0</h2>
                        @endif
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-new-customer-chart" class="apex-charts"></div>
                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 25.16%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Sertifikasi yang sedang diikuti</span>
                        @if ($sertifikasi)
                            <h2 class="mb-0">{{ $sertifikasi->jumlah }}</h2>
                        @else
                            <h2 class="mb-0">0</h2>
                        @endif
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-new-visitors-chart" class="apex-charts"></div>
                        <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- stats + charts -->
<div class="row">
    <style type="text/css">
        .gambar{
            position: relative;
            z-index: 1;
            top: 0px;
        }
        .teks{
            position: absolute;
            top: 20px;
            z-index: 2;
            color: #fff;
        }
    </style>
    <div class="col-sm-12 col-xl-12">
        <h4 class="mb-1 mt-0">Sertifikasi dan Pelatihan</h4>
    </div>
    @if ($list_acara->count())
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">{{ $list_acara[0]->nama }}</h1>
                <p class="lead my-3">{{ Str::limit(strip_tags($list_acara[0]->deskripsi), 200, '...') }}</p>
                <p class="lead mb-0"><a href="/acara/{{ $list_acara[0]->id }}" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>

        <div class="row mb-2">
            @foreach ($list_acara->skip(1) as $acara)
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
</div>
<div class="row justify-content-end">
    <a href="/acara" class="btn btn-link">Lihat Semua <i data-feather="arrow-right"></i></a>
    {{ $list_acara->links() }}
</div>
<hr>
<div class="row">
    <div class="col-sm-12 col-xl-12">
        <h4 class="mb-1 mt-0">Berita</h4>
    </div>
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
</div>
<div class="row justify-content-end">
    <a href="/berita" class="btn btn-link">Lihat Semua <i data-feather="arrow-right"></i></a>
    {{ $list_berita->links() }}
</div>
<!-- end row -->
@endsection