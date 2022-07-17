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
                    <a href="/instruktur" class="btn btn-{{ (!$status) ? 'primary' : 'white' }}">All</a>
                </div>
                <div class="btn-group ml-1">
                    <a href="/instruktur?status=ongoing" class="btn btn-{{ ($status == 'ongoing') ? 'primary' : 'white' }}">Ongoing</a>
                    <a href="/instruktur?status=finished" class="btn btn-{{ ($status == 'finished')  ? 'primary' : 'white' }}">Finished / Histori</a>
                </div>
                <div class="btn-group ml-2 d-none d-sm-inline-block">
                    <a href="/instruktur{{ ($status) ? '?status='.$status : '' }}" class="btn btn-primary btn-sm"><i class="uil uil-apps"></i></a>
                </div>
                <div class="btn-group d-none d-sm-inline-block">
                    <a href="/instruktur/list{{ ($status) ? '?status='.$status : '' }}" class="btn btn-white btn-sm"><i class="uil uil-align-left-justify"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if ($list_acara->count())
            
            @foreach ($list_acara as $acara)
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if ($acara->status_acara_id == 6)
                                <div class="badge badge-primary float-right">OnGoing</div>
                            @else
                                <div class="badge badge-success float-right">Finished</div>
                            @endif
                            <p class="text-success text-uppercase font-size-12 mb-2">{{ $acara->kategoriAcara->kategori }}</p>
                            <h5><a href="/instruktur/acara/{{ $acara->id }}" class="text-dark">{{ $acara->nama }}</a></h5>
                            <p class="text-muted mb-4">{{ Str::limit(strip_tags($acara->deskripsi), 200, '...') }}</p>
                            <?php 
                                $peserta = Peserta::where('acara_id', $acara->id)->limit(5)->get();
                            ?>
                            <div>
                                @foreach ($peserta as $p)
                                    <a href="javascript: void(0);">
                                        <img src="{{ asset("storage/".$p->mahasiswa->user->foto) }}" alt="" class="avatar-sm m-1 rounded-circle">
                                    </a>
                                @endforeach
                                {{-- <a href="javascript: void(0);">
                                    <img src="/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a> --}}
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pr-2">
                                            <a href="#" class="text-muted d-inline-block"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Tanggal Pelaksanaan">
                                                <i class="uil uil-calender mr-1"></i> {{ Carbon::parse($acara->pelaksanaan_buka)->translatedFormat('d F Y') }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item pr-2">
                                            <a href="#" class="text-muted d-inline-block"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Jumlah Kelas">
                                                <i class="uil uil-bars mr-1"></i> {{ $acara->jumlah_kelas }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Jumlah Peserta">
                                                <i class="uil uil-users-alt mr-1"></i> {{ $acara->jumlah_peserta }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
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