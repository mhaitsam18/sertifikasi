@extends('auth.layouts.home')

@section('container')
<?php 
    use Illuminate\Support\Carbon;
?>
<div class="container marketing">
    <div class="row my-3">
        <h2 class="mb-3">{{ $acara->nama }} <span class="badge bg-primary">{{ $acara->kategoriAcara->kategori }}</span></h2>  
        <div>
            <a href="javascript:window.history.go(-1)" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
            {{-- <form action="/dashboard/acara/{{ $acara->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are Your Sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form> --}}
        </div>
    </div>
    <div class="row my-3">
        <div class="col-lg-8">
            @if ($acara->thumbnail)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset("storage/$acara->thumbnail") }}" alt="{{ $acara->nama }}" class="img-fluid mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $acara->nama }}" alt="{{ $acara->nama }}" class="img-fluid mt-3">
            @endif
            <article class="my-3 fs-5">
                {!! $acara->deskripsi !!}
                <p>Berikut adalah Fasilitas-fasilitas yang Akan didapat:</p>
                <ul>
                    @foreach ($list_fasilitas as $fasilitas)
                        <li>{{ $fasilitas->fasilitas }} | {{ $fasilitas->keterangan }}</li> 
                    @endforeach
                </ul>
            </article>
        </div>
        <div class="col-lg-4">
            <ol class="list-group list-group-numbered mt-3">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Pendaftaran dibuka</div>
                        {{ Carbon::parse($acara->pendaftaran_buka)->translatedFormat('l, d F Y') }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Pendaftaran ditutup</div>
                        {{ Carbon::parse($acara->pendaftaran_tutup)->translatedFormat('l, d F Y') }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Tanggal Pelaksanaan dimulai</div>
                        {{ Carbon::parse($acara->pelaksanaan_buka)->translatedFormat('l, d F Y') }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Tanggal Pelaksanaan Selesai</div>
                        {{ Carbon::parse($acara->pelaksanaan_tutup)->translatedFormat('l, d F Y') }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Lokasi</div>
                        {{ $acara->lokasi }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Biaya</div>
                        Rp.{{ number_format($acara->biaya,2,',','.') }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Kuota</div>
                        {{ $acara->kuota }} orang
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Koordinator</div>
                        {{ $acara->koordinator->kode_dosen }} | {{ $acara->koordinator->user->nama }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Status Acara</div>
                        {{ $acara->statusAcara->status }}
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Validasi</div>
                        @if ($acara->is_valid == 1)
                            <span class="badge bg-success">Valid</span>
                        @elseif ($acara->is_valid == 2)
                            <span class="badge bg-danger">Tidak Valid</span>
                        @else
                            <span class="badge bg-secondary">Belum divalidasi</span>
                        @endif
                    </div>
                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                </li>


            </ol>
        </div>
    </div>
</div>
<!-- end row -->
@endsection