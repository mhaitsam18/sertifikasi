@extends('dosen.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/koordinator/acara">Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Detail</h4>
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
    <div class="row page-title">
        <div class="col-sm-8 col-xl-6">
            <h4 class="mb-1 mt-0">
                Acara: {{ $acara->nama }}
                @if ($acara->is_valid == 1)
                    <div class="badge badge-success font-size-13 font-weight-normal">Valid</div>
                @else
                    <div class="badge badge-danger font-size-13 font-weight-normal">Belum divalidasi</div>    
                @endif
                <div class="badge badge-soft-primary font-size-13 font-weight-normal">{{ $acara->statusAcara->status }}</div>
            </h4>
        </div>
        <div class="col-sm-4 col-xl-6 text-sm-right">
            <div class="btn-group ml-2 d-none d-sm-inline-block">
                <a href="/dosen/jadwalAcara?acara_id={{ $acara->id }}" class="btn btn-soft-warning btn-sm"><i class="uil uil-edit mr-1"></i>Kelola Jadwal</a>
            </div>
            <div class="btn-group ml-2 d-none d-sm-inline-block">
                <a href="/dosen/kelasAcara?acara_id={{ $acara->id }}" class="btn btn-soft-success btn-sm"><i class="uil uil-edit mr-1"></i>Kelola Kelas</a>
            </div>
            <div class="btn-group ml-2 d-none d-sm-inline-block">
                <a href="/koordinator/acara/{{ $acara->id }}/edit/" class="btn btn-soft-primary btn-sm"><i class="uil uil-edit mr-1"></i>Edit</a>
            </div>
            <div class="btn-group d-none d-sm-inline-block">
                @if ($acara->deleted_at)
                    <form action="/koordinator/acara/restore/" method="post" class="d-inline">
                        {{-- @method('restore') --}}
                        <input type="hidden" name="id" value="{{ $acara->id }}">
                        @csrf
                        <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Are Your Sure?')"><i class="uil uil-redo-alt mr-1"></i>Delete</button>
                    </form>
                @else
                    <form action="/koordinator/acara/{{ $acara->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Are Your Sure?')"><i class="uil uil-trash-alt mr-1"></i>Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body p-0">
                    <h6 class="card-title border-bottom p-3 mb-0 header-title">Ulasan Acara</h6>
                    <div class="row py-1">
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 1 -->
                            <div class="media p-3">
                                <i data-feather="users" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">{{ $acara->kuota }}</h4>
                                    <span class="text-muted font-size-13">Kuota</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 2 -->
                            <div class="media p-3">
                                <i data-feather="credit-card" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">Rp. {{ number_format($acara->biaya, 2, ',', '.') }}</h4>
                                    <span class="text-muted">Biaya</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 3 -->
                            <div class="media p-3">
                                <i data-feather="star" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">{{ number_format($rating_acara,1,',') }}</h4>
                                    <span class="text-muted">Rating</span>
                                    {{-- <h4 class="mt-0 mb-0">{{ $acara->koordinator->kode_dosen }}</h4>
                                    <span class="text-muted">Koordinator</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 3 -->
                            <div class="media p-3">
                                <i data-feather="grid" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">{{ $acara->kategoriAcara->kategori }}</h4>
                                    <span class="text-muted">Kategori Acara</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- details-->
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-0 header-title">Deskripsi Acara</h6>

                    <div class="text-muted mt-3">
                        {!! $acara->deskripsi !!}
                        @if ($list_fasilitas->count())
                            <p>Berikut merupakan Fasilitas-fasilitas yang Akan didapat:</p>
                            <h6 class="font-weight-bold">Data Fasilitas</h6>
                            <ul class="pl-4 mb-4">
                                @foreach ($list_fasilitas as $fasilitas)
                                    <li>{{ $fasilitas->fasilitas }} | {{ $fasilitas->keterangan }}</li> 
                                @endforeach
                            </ul>
                        @endif
                        {{-- <ul class="pl-4 mb-4">
                            <li>Quis autem vel eum iure</li>
                            <li>Ut enim ad minima veniam</li>
                            <li>Et harum quidem rerum</li>
                            <li>Nam libero cum soluta</li>
                        </ul>

                        <div class="tags">
                            <h6 class="font-weight-bold">Tags</h6>
                            <div class="text-uppercase">
                                <a href="#" class="badge badge-soft-primary mr-2">Html</a>
                                <a href="#" class="badge badge-soft-primary mr-2">Css</a>
                                <a href="#" class="badge badge-soft-primary mr-2">Bootstrap</a>
                                <a href="#" class="badge badge-soft-primary mr-2">JQuery</a>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calender text-danger"></i> Pendaftaran buka</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($acara->pendaftaran_buka)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> Pendaftaran tutup</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($acara->pendaftaran_tutup)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calender text-danger"></i> Acara dimulai</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($acara->pelaksanaan_buka)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> Acara Selesai</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($acara->pelaksanaan_tutup)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="assign team mt-4">
                            <h6 class="font-weight-bold">Profil Instruktur</h6>
                            <div class="d-flex">
                                @foreach ($list_instruktur as $instruktur)
                                    <a href="" class="align-content-center">
                                        <p class="text-center">
                                            <img src="{{ asset("storage/".$instruktur->user->foto) }}" alt="" class="avatar-sm m-1 rounded-circle">
                                            <br>
                                            {{ $instruktur->kode_dosen }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4">
                            <h6 class="font-weight-bold">Thumbnail</h6>

                            <div class="row">
                                <div class="col-xl-9 col-md-9">
                                    <div class="p-2 border rounded mb-2">
                                        <img class="img-fluid d-block" src="{{ asset('storage/'.$acara->thumbnail) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <ul class="nav nav-pills navtab-bg">
                            <li class="nav-item">
                                <a href="#rating" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Rating
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#berita-acara" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    Berita Acara
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content text-muted">
                            <div class="tab-pane show active" id="rating">
                                <h5 class="mb-4 pb-1 header-title">Comments ({{ $list_rating->count() }})</h5>
                                @if ($list_rating->count())
                                    @foreach ($list_rating as $r)
                                        <div class="media mb-4 font-size-14">
                                            <div class="mr-3">
                                                <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="{{ asset("storage/".$r->peserta->mahasiswa->user->foto) }}"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 font-size-15">
                                                    {{ $r->peserta->mahasiswa->user->nama }} 
                                                    <?php 
                                                    for ($i=0; $i < $r->rating; $i++) { ?>
                                                        <i class="fa-solid fa-star" style="color: #FCD93A;"></i>
                                                    <?php } ?>
                                                </h5>
                                                <p class="text-muted mb-1">
                                                    {{ $r->komentar }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="media mb-4 font-size-14">
                                        <div class="media-body">
                                            <p class="text-muted mb-1">
                                                Tidak Ada Komentar
                                            </p>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="tab-pane" id="berita-acara">
                                <h5 class="mb-3">Attached Files:</h5>
                                <div>
                                    <div class="p-2 border rounded mb-3">
                                        <div class="media">
                                            <div class="avatar-sm font-weight-bold mr-3">
                                                <span class="avatar-title rounded bg-soft-primary text-primary">
                                                    <i class="uil-file-plus-alt font-size-18"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <a href="#" class="d-inline-block mt-2">Landing
                                                    1.psd</a>
                                            </div>
                                            <div class="float-right mt-1">
                                                <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border rounded mb-3">
                                        <div class="media">
                                            <div class="avatar-sm font-weight-bold mr-3">
                                                <span class="avatar-title rounded bg-soft-primary text-primary">
                                                    <i class="uil-file-plus-alt font-size-18"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <a href="#" class="d-inline-block mt-2">Landing
                                                    2.psd</a>
                                            </div>
                                            <div class="float-right mt-1">
                                                <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-2 border rounded mb-3">
                                        <div>
                                            <a href="#" class="d-inline-block m-1"><img src="/images/small/img-2.jpg" alt="" class="avatar-lg rounded"></a>
                                            <a href="#" class="d-inline-block m-1"><img src="/images/small/img-3.jpg" alt="" class="avatar-lg rounded"></a>
                                            <a href="#" class="d-inline-block m-1"><img src="/images/small/img-4.jpg" alt="" class="avatar-lg rounded"></a>
                                        </div>
                                    </div>

                                    <div class="p-2 border rounded mb-3">
                                        <div class="media">
                                            <div class="avatar-sm font-weight-bold mr-3">
                                                <span class="avatar-title rounded bg-soft-primary text-primary">
                                                    <i class="uil-file-plus-alt font-size-18"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <a href="#" class="d-inline-block mt-2">Logo.psd</a>
                                            </div>
                                            <div class="float-right mt-1">
                                                <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border rounded mb-3">
                                        <div>
                                            <a href="#" class="d-inline-block m-1"><img src="/images/small/img-7.jpg" alt="" class="avatar-lg rounded"></a>
                                            <a href="#" class="d-inline-block m-1"><img src="/images/small/img-6.jpg" alt="" class="avatar-lg rounded"></a>
                                        </div>
                                    </div>

                                    <div class="p-2 border rounded mb-3">
                                        <div class="media">
                                            <div class="avatar-sm font-weight-bold mr-3">
                                                <span class="avatar-title rounded bg-soft-primary text-primary">
                                                    <i class="uil-file-plus-alt font-size-18"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <a href="#" class="d-inline-block mt-2">Clients.psd</a>
                                            </div>
                                            <div class="float-right mt-1">
                                                <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-0 header-title">Acara Lainnya</h6>

                    <ul class="list-unstyled activity-widget">
                        @foreach ($list_acara as $a)
                            <li class="activity-list">
                                <div class="media">
                                    <div class="text-center mr-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">{{ Carbon::parse($a->pelaksanaan_buka)->translatedFormat('d') }}</span>
                                        </div>
                                        <p class="text-muted font-size-13 mb-0">{{ Carbon::parse($a->pelaksanaan_buka)->translatedFormat('M') }}</p>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="/koordinator/acara/{{ $a->id }}" class="text-dark">{{ $a->nama }}</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">{{ Str::limit(strip_tags($a->deskripsi), 35, '...') }}</p>
                                    </div>
                                </div>
                            </li>    
                        @endforeach
                    </ul>
                    <div class="text-center">
                        <a href="/koordinator/acara" class="btn btn-sm border btn-white">
                            <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                            Load more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
