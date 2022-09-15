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
                    {{-- <li class="breadcrumb-item"><a href="/dosen/instruktur">Instruktur</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Histori</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Histori Instruktur | Sertifikasi dan Pelatihan yang sedang berjalan</h4>
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
        <div class="col-xl-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="row">
                                <h4>Histori</h4>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <!-- upcoming tasks -->
                                    <div class="mt-4">
                                        <a class="text-dark" data-toggle="collapse"
                                            href="#pelatihan" aria-expanded="false"
                                            aria-controls="pelatihan">
                                            <h5 class="mb-0">
                                                <i class='uil uil-angle-down font-18'></i>Pelatihan <span
                                                    class="text-muted font-size-14">({{ $list_pelatihan->count() }})</span>
                                            </h5>
                                        </a>

                                        <div class="collapse show" id="pelatihan">
                                            <div class="card mb-0 shadow-none">
                                                <div class="card-body">
                                                    
                                                    @foreach ($list_pelatihan as $pelatihan)
                                                        <!-- task -->
                                                        <div class="row justify-content-sm-between border-bottom">
                                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="task1">
                                                                    <label class="custom-control-label" for="task1">
                                                                        {{ $pelatihan->nama }}
                                                                    </label>
                                                                </div> <!-- end checkbox --> --}}
                                                                <a href="/instruktur/acara/{{ $pelatihan->id }}" class="text-muted mb-4">{{ $pelatihan->nama }}</a>
                                                            </div> <!-- end col -->
                                                            <div class="col-lg-6">
                                                                <div class="d-sm-flex justify-content-between">
                                                                    <div>
                                                                        <img src="{{ asset("storage/".$pelatihan->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="{{ $pelatihan->koordinator->user->nama }}" />
                                                                    </div>
                                                                    <div class="mt-3 mt-sm-0">
                                                                        <ul class="list-inline font-13 text-sm-right">
                                                                            <li class="list-inline-item pr-1">
                                                                                <i class='uil uil-schedule font-16 mr-1'></i>
                                                                                {{ Carbon::parse($pelatihan->pelaksanaan_tutup)->translatedFormat('d F Y') }}
                                                                            </li>
                                                                            <li class="list-inline-item pr-1">
                                                                                <i class='uil uil-bars font-16 mr-1'></i>
                                                                                {{ $pelatihan->jumlah_kelas }}
                                                                            </li>
                                                                            <li class="list-inline-item pr-2">
                                                                                <i class='uil uil-users-alt font-16 mr-1'></i>
                                                                                {{ $pelatihan->jumlah_peserta }}
                                                                            </li>
                                                                            {{-- <li class="list-inline-item">
                                                                                <span class="badge badge-soft-{{ ($pelatihan->kategori_acara_id == 1) ? 'primary' : 'success' }} p-1">{{ $pelatihan->kategoriAcara->kategori }}</span>
                                                                            </li> --}}
                                                                        </ul>
                                                                    </div>
                                                                </div> <!-- end .d-flex-->
                                                            </div> <!-- end col -->
                                                        </div>
                                                        <!-- end task -->
                                                    @endforeach
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card -->
                                        </div> <!-- end collapse-->

                                        <a class="text-dark" data-toggle="collapse"
                                            href="#sertifikasi" aria-expanded="false"
                                            aria-controls="sertifikasi">
                                            <h5 class="mb-0">
                                                <i class='uil uil-angle-down font-18'></i>Sertifikasi <span
                                                    class="text-muted font-size-14">({{ $list_sertifikasi->count() }})</span>
                                            </h5>
                                        </a>

                                        <div class="collapse show" id="sertifikasi">
                                            <div class="card mb-0 shadow-none">
                                                <div class="card-body">
                                                    @foreach ($list_sertifikasi as $sertifikasi)
                                                        <!-- task -->
                                                        <div class="row justify-content-sm-between border-bottom">
                                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="task1">
                                                                    <label class="custom-control-label" for="task1">
                                                                        {{ $sertifikasi->nama }}
                                                                    </label>
                                                                </div> <!-- end checkbox --> --}}
                                                                <a href="/instruktur/acara/{{ $sertifikasi->id }}" class="text-muted mb-4">{{ $sertifikasi->nama }}</a>
                                                            </div> <!-- end col -->
                                                            <div class="col-lg-6">
                                                                <div class="d-sm-flex justify-content-between">
                                                                    <div>
                                                                        <img src="{{ asset("storage/".$sertifikasi->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="{{ $sertifikasi->koordinator->user->nama }}" />
                                                                    </div>
                                                                    <div class="mt-3 mt-sm-0">
                                                                        <ul class="list-inline font-13 text-sm-right">
                                                                            <li class="list-inline-item pr-1">
                                                                                <i class='uil uil-schedule font-16 mr-1'></i>
                                                                                {{ Carbon::parse($sertifikasi->pelaksanaan_tutup)->translatedFormat('d F Y') }}
                                                                            </li>
                                                                            <li class="list-inline-item pr-1">
                                                                                <i class='uil uil-bars font-16 mr-1'></i>
                                                                                {{ $sertifikasi->jumlah_kelas }}
                                                                            </li>
                                                                            <li class="list-inline-item pr-2">
                                                                                <i class='uil uil-users-alt font-16 mr-1'></i>
                                                                                {{ $sertifikasi->jumlah_peserta }}
                                                                            </li>
                                                                            {{-- <li class="list-inline-item">
                                                                                <span class="badge badge-soft-{{ ($sertifikasi->kategori_acara_id == 1) ? 'primary' : 'success' }} p-1">{{ $sertifikasi->kategoriAcara->kategori }}</span>
                                                                            </li> --}}
                                                                        </ul>
                                                                    </div>
                                                                </div> <!-- end .d-flex-->
                                                            </div> <!-- end col -->
                                                        </div>
                                                        <!-- end task -->
                                                    @endforeach
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card -->
                                        </div> <!-- end collapse-->
                                    </div>
                                    <!-- end upcoming tasks -->
                                </div>
                            </div>

                            {{-- <div class="row mb-3 mt-5">
                                <div class="col-12">
                                    <div class="text-center">
                                        <a href="javascript:void(0);" class="btn btn-white mb-3">
                                            <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                                            Load more
                                        </a>
                                    </div>
                                </div> <!-- end col-->
                            </div> --}}
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection