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
                <li class="breadcrumb-item active" aria-current="page">Notifikasi</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Notifikasi</h4>
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

            </div>
            <div class="card-body">
                <h6 class="mt-0 header-title">Notifikasi</h6>
                <!-- cta -->
                <div class="row">
                    <div class="col-sm-3">
                        <a href="/mahasiswa/notifikasi/read" class="btn btn-link"><i class='uil uil-eye mr-1'></i>Tandai semua sudah dibaca</a>
                    </div>
                    <div class="col-sm-9">
                        <div class="float-sm-right mt-3 mt-sm-0">

                            <div class="task-search d-inline-block mb-3 mb-sm-0 mr-sm-3">
                                <form action="/mahasiswa/notifikasi" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control search-input" placeholder="Search..." />
                                        <span class="uil uil-search icon-search"></span>
                                        <div class="input-group-append">
                                            <button class="btn btn-soft-primary" type="button">
                                                <i class='uil uil-file-search-alt'></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='uil uil-sort-amount-down'></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach ($data_kategori_notifikasi as $kategori_notifikasi)
                                        <a class="dropdown-item" href="/mahasiswa/notifikasi?kategori_notifikasi_id={{ $kategori_notifikasi->id }}">{{ $kategori_notifikasi->kategori }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <a class="text-dark" data-toggle="collapse" href="#todayTasks" aria-expanded="false" aria-controls="todayTasks">
                            <h5 class="mb-0"><i class='uil uil-angle-down font-size-18'></i>Hari Ini <span class="text-muted font-size-14">({{ $notifikasi_today->count() }})</span></h5>
                        </a>

                        <div class="collapse show" id="todayTasks">
                            <div class="card mb-0 shadow-none">
                                <div class="card-body">
                                    <!-- task -->
                                    @foreach ($notifikasi_today as $today)
                                    @php
                                        $url ="/mahasiswa/notifikasi/".$today->id;
                                    @endphp
                                    <div class="row justify-content-sm-between border-bottom">
                                        <div class="col-lg-6 mb-2 mb-lg-0">
                                            <div class="custom-control {{-- custom-checkbox --}}">
                                                
                                                {{-- <input type="checkbox" class="custom-control-input" id="task1"> --}}
                                                
                                                <label class="{{-- custom-control-label --}}" for="task1">
                                                    <a href="{{ $url }}" class="text-dark">
                                                        {{$today->subjek}} 
                                                    </a>
                                                    @if ($today->is_read == 0)
                                                        <span class="badge rounded-pill badge-primary">Baru</span>
                                                    @endif
                                                </label>
                                                <p>{{ $today->pesan }}</p>
                                            </div> <!-- end checkbox -->
                                        </div> <!-- end col -->
                                        <div class="col-lg-6">
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    @switch($today->kategori_notifikasi_id)
                                                        @case(4)
                                                            <span class="badge rounded-pill bg-info" data-toggle="tooltip" data-placement="bottom" title="Berita Baru" style="font-size: 14pt;">
                                                                <i class="fa-solid fa-person-circle-check"></i>
                                                            </span>
                                                            @break
                                                        @case(5)
                                                            <span class="badge rounded-pill bg-success" data-toggle="tooltip" data-placement="bottom" title="Berita Baru" style="font-size: 14pt;">
                                                                <i class="fa-solid fa-file-certificate"></i>
                                                            </span>
                                                            @break
                                                        @case(6)
                                                            <span class="badge rounded-pill bg-warning" data-toggle="tooltip" data-placement="bottom" title="Berita Baru" style="font-size: 14pt;">
                                                                <i class="fa-solid fa-newspaper"></i>
                                                            </span>
                                                            @break
                                                        @default
                                                            
                                                    @endswitch
                                                    
                                                    {{-- <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Assigned to Arya S" /> --}}
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <ul class="list-inline font-13 text-sm-right">
                                                        <li class="list-inline-item pr-1">
                                                            <i class='uil uil-schedule font-16 mr-1'></i>
                                                            {{ $today->created_at->diffForHumans() }}
                                                        </li>
                                                        <li class="list-inline-item pr-1">
                                                            <a href="{{ $url }}" class="btn btn-link">Buka</a>
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
                        <div class="mt-3 mb-3">
                            <a class="text-dark" data-toggle="collapse" href="#otherTasks" aria-expanded="false" aria-controls="otherTasks">
                                <h5 class="mb-0"><i class='uil uil-angle-down font-size-18'></i>Lainnya <span class="text-muted font-size-14">({{ $notifikasi_other->count() }})</span></h5>
                            </a>
    
                            <div class="collapse" id="otherTasks">
                                <div class="card mb-0 shadow-none">
                                    <div class="card-body">
                                        <!-- task -->
                                        @foreach ($notifikasi_other as $other)
                                        @php
                                            $url ="/mahasiswa/notifikasi/".$other->id;
                                        @endphp
                                        <div class="row justify-content-sm-between border-bottom">
                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                <div class="custom-control {{-- custom-checkbox --}}">
                                                    
                                                    {{-- <input type="checkbox" class="custom-control-input" id="task1"> --}}
                                                    
                                                    <label class="{{-- custom-control-label --}}" for="task1">
                                                        <a href="{{ $url }}" class="text-dark">
                                                            {{$other->subjek}} 
                                                        </a>
                                                        @if ($other->is_read == 0)
                                                            <span class="badge rounded-pill badge-primary">Baru</span>
                                                        @endif
                                                    </label>
                                                    <p>{{ $other->pesan }}</p>
                                                </div> <!-- end checkbox -->
                                            </div> <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="d-sm-flex justify-content-between">
                                                    <div>
                                                        @switch($other->kategori_notifikasi_id)
                                                            @case(4)
                                                                <span class="badge rounded-pill bg-info" data-toggle="tooltip" data-placement="bottom" title="Berita Baru" style="font-size: 14pt;">
                                                                    <i class="fa-solid fa-person-circle-check"></i>
                                                                </span>
                                                                @break
                                                            @case(5)
                                                                <span class="badge rounded-pill bg-success" data-toggle="tooltip" data-placement="bottom" title="Berita Baru" style="font-size: 14pt;">
                                                                    <i class="fa-solid fa-file-certificate"></i>
                                                                </span>
                                                                @break
                                                            @case(6)
                                                                <span class="badge rounded-pill bg-warning" data-toggle="tooltip" data-placement="bottom" title="Berita Baru" style="font-size: 14pt;">
                                                                    <i class="fa-solid fa-newspaper"></i>
                                                                </span>
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                        
                                                        {{-- <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Assigned to Arya S" /> --}}
                                                    </div>
                                                    <div class="mt-3 mt-sm-0">
                                                        <ul class="list-inline font-13 text-sm-right">
                                                            <li class="list-inline-item pr-1">
                                                                <i class='uil uil-schedule font-16 mr-1'></i>
                                                                {{ $other->created_at->diffForHumans() }}
                                                            </li>
                                                            <li class="list-inline-item pr-1">
                                                                <a href="{{ $url }}" class="btn btn-link">Buka</a>
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
                        </div>
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
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection