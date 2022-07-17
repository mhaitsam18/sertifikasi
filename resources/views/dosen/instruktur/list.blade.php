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
                    <li class="breadcrumb-item active" aria-current="page">Instruktur</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Instruktur | Sertifikasi dan Pelatihan yang sedang berjalan</h4>
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
    <div class="row page-title align-items-center">
        <div class="col-md-3 col-xl-6">
            <h4 class="mb-1 mt-0">Daftar Pelatihan / Sertifikasi</h4>
        </div>
        <div class="col-md-9 col-xl-6 text-md-right">
            <div class="mt-4 mt-md-0">
                {{-- <button type="button" class="btn btn-danger mr-4 mb-3  mb-sm-0"><i class="uil-plus mr-1"></i> Create Project</button> --}}
                <div class="btn-group mb-3 mb-sm-0">
                    <a href="/instruktur/list" class="btn btn-{{ (!$status) ? 'primary' : 'white' }}">All</a>
                </div>
                <div class="btn-group ml-1">
                    <a href="/instruktur/list?status=ongoing" class="btn btn-{{ ($status == 'ongoing') ? 'primary' : 'white' }}">Ongoing</a>
                    <a href="/instruktur/list?status=finished" class="btn btn-{{ ($status == 'finished')  ? 'primary' : 'white' }}">Finished / Histori</a>
                </div>
                <div class="btn-group ml-2 d-none d-sm-inline-block">
                    <a href="/instruktur{{ ($status) ? '?status='.$status : '' }}" class="btn btn-white btn-sm"><i class="uil uil-apps"></i></a>
                </div>
                <div class="btn-group d-none d-sm-inline-block">
                    <a href="/instruktur/list{{ ($status) ? '?status='.$status : '' }}" class="btn btn-primary btn-sm"><i class="uil uil-align-left-justify"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="row">
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <a class="text-dark" data-toggle="collapse" href="#ongoing"
                                        aria-expanded="false" aria-controls="ongoing">
                                        <h5 class="mb-0"><i class='uil uil-angle-down font-size-18'></i>On Going <span class="text-muted font-size-14">({{ $list_acara_ongoing->count() }})</span></h5>
                                    </a>

                                    <div class="collapse show" id="ongoing">
                                        <div class="card mb-0 shadow-none">
                                            <div class="card-body">
                                                @foreach ($list_acara_ongoing as $ongoing)
                                                    <!-- task -->
                                                    <div class="row justify-content-sm-between border-bottom">
                                                        <div class="col-lg-6 mb-2 mb-lg-0">
                                                            {{-- <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task1">
                                                                <label class="custom-control-label" for="task1">
                                                                    {{ $ongoing->nama }}
                                                                </label>
                                                            </div> <!-- end checkbox --> --}}
                                                            <a href="/instruktur/acara/{{ $ongoing->id }}" class="text-muted mb-4">{{ $ongoing->nama }}</a>
                                                        </div> <!-- end col -->
                                                        <div class="col-lg-6">
                                                            <div class="d-sm-flex justify-content-between">
                                                                <div>
                                                                    <img src="{{ asset("storage/".$ongoing->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Assigned to Arya S" />
                                                                </div>
                                                                <div class="mt-3 mt-sm-0">
                                                                    <ul class="list-inline font-13 text-sm-right">
                                                                        <li class="list-inline-item pr-1">
                                                                            <i class='uil uil-schedule font-16 mr-1'></i>
                                                                            {{ Carbon::parse($ongoing->pelaksanaan_buka)->translatedFormat('d F Y') }}
                                                                            {{-- {{ $ongoing->created_at->diffForHumans() }} --}}
                                                                        </li>
                                                                        <li class="list-inline-item pr-1">
                                                                            <i class='uil uil-bars font-16 mr-1'></i>
                                                                            {{ $ongoing->jumlah_kelas }}
                                                                        </li>
                                                                        <li class="list-inline-item pr-2">
                                                                            <i class='uil uil-users-alt font-16 mr-1'></i>
                                                                            {{ $ongoing->jumlah_peserta }}
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span class="badge badge-soft-{{ ($ongoing->kategori_acara_id == 1) ? 'primary' : 'success' }} p-1">{{ $ongoing->kategoriAcara->kategori }}</span>
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
                                    </div> <!-- end .collapse-->

                                    <!-- upcoming tasks -->
                                    <div class="mt-4">
                                        <a class="text-dark" data-toggle="collapse"
                                            href="#finished" aria-expanded="false"
                                            aria-controls="finished">
                                            <h5 class="mb-0">
                                                <i class='uil uil-angle-down font-18'></i>Finished / Histori <span
                                                    class="text-muted font-size-14">({{ $list_acara_finished->count() }})</span>
                                            </h5>
                                        </a>

                                        <div class="collapse show" id="finished">
                                            <div class="card mb-0 shadow-none">
                                                <div class="card-body">
                                                    @foreach ($list_acara_finished as $finished)
                                                        <!-- task -->
                                                        <div class="row justify-content-sm-between border-bottom">
                                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="task1">
                                                                    <label class="custom-control-label" for="task1">
                                                                        {{ $finished->nama }}
                                                                    </label>
                                                                </div> <!-- end checkbox --> --}}
                                                                <a href="/instruktur/acara/{{ $finished->id }}" class="text-muted mb-4">{{ $finished->nama }}</a>
                                                            </div> <!-- end col -->
                                                            <div class="col-lg-6">
                                                                <div class="d-sm-flex justify-content-between">
                                                                    <div>
                                                                        <img src="{{ asset("storage/".$finished->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Assigned to Arya S" />
                                                                    </div>
                                                                    <div class="mt-3 mt-sm-0">
                                                                        <ul class="list-inline font-13 text-sm-right">
                                                                            <li class="list-inline-item pr-1">
                                                                                <i class='uil uil-schedule font-16 mr-1'></i>
                                                                                {{ Carbon::parse($finished->pelaksanaan_tutup)->translatedFormat('d F Y') }}
                                                                            </li>
                                                                            <li class="list-inline-item pr-1">
                                                                                <i class='uil uil-bars font-16 mr-1'></i>
                                                                                {{ $finished->jumlah_kelas }}
                                                                            </li>
                                                                            <li class="list-inline-item pr-2">
                                                                                <i class='uil uil-users-alt font-16 mr-1'></i>
                                                                                {{ $finished->jumlah_peserta }}
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <span class="badge badge-soft-{{ ($finished->kategori_acara_id == 1) ? 'primary' : 'success' }} p-1">{{ $finished->kategoriAcara->kategori }}</span>
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

        <!-- task details -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection