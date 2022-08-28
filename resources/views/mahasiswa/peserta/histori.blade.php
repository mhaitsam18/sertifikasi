@extends('mahasiswa.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title d-print-none">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Histori</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Histori, Nilai dan Status Kelulusan Peserta</h4>
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
        <div class="col-12">
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
                                                    <div class="col-lg-4 mb-2 mb-lg-0">
                                                        {{-- <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="task1">
                                                            <label class="custom-control-label" for="task1">
                                                                {{ $pelatihan->acara->nama }}
                                                            </label>
                                                        </div> <!-- end checkbox --> --}}
                                                        <a href="/acara/{{ $pelatihan->acara->id }}" class="text-muted mb-4">{{ $pelatihan->acara->nama }}</a>
                                                    </div> <!-- end col -->
                                                    <div class="col-lg-8">
                                                        <div class="d-sm-flex justify-content-between">
                                                            <div>
                                                                <img src="{{ asset("storage/".$pelatihan->acara->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="{{ $pelatihan->acara->koordinator->user->nama }}" />
                                                            </div>
                                                            @if (isset($pelatihan->nilai) && $pelatihan->nilai->sertifikat)
                                                                <div class="ml-1">
                                                                    <a href="/get?file=sertifikat&image={{ $pelatihan->nilai->sertifikat }}" class="btn btn-info btn-sm">Unduh Sertifikat</a>
                                                                </div>
                                                            @else
                                                                <div class="ml-1">
                                                                    <a href="#" class="btn btn-info btn-sm sertifikat-tidak-tersedia">Unduh Sertifikat</a>
                                                                </div>
                                                            @endif
                                                            {{-- @if (isset($pelatihan->sertifikat))
                                                                <div class="ml-1">
                                                                    <a href="" class="btn btn-link btn-sm">Serifikat Lainnya</a>
                                                                </div>
                                                            @endif --}}
                                                            <div class="mt-3 mt-sm-0">
                                                                <ul class="list-inline font-13 text-sm-right">
                                                                    <li class="list-inline-item pr-1">
                                                                        <i class='uil uil-schedule font-16 mr-1'></i>
                                                                        {{ Carbon::parse($pelatihan->updated_at)->translatedFormat('d F Y') }}
                                                                    </li>
                                                                    @if (isset($pelatihan->nilai))
                                                                        <li class="list-inline-item pr-2">
                                                                            Nilai : {{ $pelatihan->nilai->nilai }}
                                                                        </li>
                                                                    @endif
                                                                    <li class="list-inline-item">
                                                                        <span class="badge badge-soft-{{ $pelatihan->status_peserta_id == 6 ? 'success' : ($pelatihan->status_peserta_id == 7 ? 'danger' : 'primary') }} p-1">{{ $pelatihan->statusPeserta->status }}</span>
                                                                    </li>
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
                                                    <div class="col-lg-4 mb-2 mb-lg-0">
                                                        {{-- <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="task1">
                                                            <label class="custom-control-label" for="task1">
                                                                {{ $sertifikasi->acara->nama }}
                                                            </label>
                                                        </div> <!-- end checkbox --> --}}
                                                        <a href="/acara/{{ $sertifikasi->acara->id }}" class="text-muted mb-4">{{ $sertifikasi->acara->nama }}</a>
                                                    </div> <!-- end col -->
                                                    <div class="col-lg-8">
                                                        <div class="d-sm-flex justify-content-between">
                                                            <div>
                                                                <img src="{{ asset("storage/".$sertifikasi->acara->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="{{ $sertifikasi->acara->koordinator->user->nama }}" />
                                                            </div>
                                                            @if (isset($sertifikasi->nilai) && $sertifikasi->nilai->sertifikat)
                                                                <div class="ml-1">
                                                                    <a href="/get?file=sertifikat&image={{ $sertifikasi->nilai->sertifikat }}" class="btn btn-info btn-sm">Unduh Sertifikat</a>
                                                                </div>
                                                            @else
                                                                <div class="ml-1">
                                                                    <a href="#" class="btn btn-info btn-sm sertifikat-tidak-tersedia">Unduh Sertifikat</a>
                                                                </div>
                                                            
                                                            @endif
                                                            {{-- @if (isset($sertifikasi->sertifikat))
                                                                <div class="ml-1">
                                                                    <a href="" class="btn btn-link btn-sm">Serifikat Lainnya</a>
                                                                </div>
                                                            @endif --}}
                                                            <div class="mt-3 mt-sm-0">
                                                                <ul class="list-inline font-13 text-sm-right">
                                                                    <li class="list-inline-item pr-1">
                                                                        <i class='uil uil-schedule font-16 mr-1'></i>
                                                                        {{ Carbon::parse($sertifikasi->updated_at)->translatedFormat('d F Y') }}
                                                                    </li>
                                                                    @if (isset($sertifikasi->nilai))
                                                                        <li class="list-inline-item pr-2">
                                                                            Nilai : {{ $sertifikasi->nilai->nilai }}
                                                                        </li>
                                                                    @endif
                                                                    <li class="list-inline-item">
                                                                        <span class="badge badge-soft-{{ $sertifikasi->status_peserta_id == 7 ? 'danger' : ($sertifikasi->status_peserta_id == 6 ? 'success' : 'primary') }} p-1">{{ $sertifikasi->statusPeserta->status }}</span>
                                                                    </li>
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
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('script')
    <script>
        $('.sertifikat-tidak-tersedia').on('click', function () {
            Swal.fire({
                icon: 'info',
                title: 'Sertifikat Tidak Tersedia',
                text: 'Jika ini adalah kesalahan, silahkan hubungi Admin',
                footer: '<a href="https://wa.me/+6289506531139?text={{ urlencode("Halo, saya ingin bertanya") }}" target="_blank"><i class="fa-brands fa-whatsapp"></i> Hubungi Admin</a>'
            })
        });
    </script>
@endsection