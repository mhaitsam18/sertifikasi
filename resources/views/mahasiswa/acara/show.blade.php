@extends('mahasiswa.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <style>
        * { box-sizing: border-box; }
        .container-2 {
            background-image: url("https://www.toptal.com/designers/subtlepatterns/patterns/concrete-texture.png");
            display: flex;
            flex-wrap: wrap;
            /* height: 100vh; */
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            margin-top: 10px;
            /* padding: 0 20px; */
        }
        .rating {
            display: flex;
            width: 100%;
            justify-content: center;
            overflow: hidden;
            flex-direction: row-reverse;
            height: 150px;
            position: relative;
        }
        .rating-0 {
            filter: grayscale(100%);
        }
        .rating > input {
            display: none;
        }
        .rating > label {
            cursor: pointer;
            width: 40px;
            height: 40px;
            margin-top: auto;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 76%;
            transition: .3s;
        }

        .rating > input:checked ~ label,
        .rating > input:checked ~ label ~ label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }
        .rating > input:not(:checked) ~ label:hover,
        .rating > input:not(:checked) ~ label:hover ~ label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }
        .emoji-wrapper {
            width: 100%;
            text-align: center;
            height: 100px;
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }
        .emoji-wrapper:before,
        .emoji-wrapper:after{
            content: "";
            height: 15px;
            width: 100%;
            position: absolute;
            left: 0;
            z-index: 1;
        }
        .emoji-wrapper:before {
            top: 0;
            background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
        }
        .emoji-wrapper:after{
            bottom: 0;
            background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
        }
        .emoji {
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: .3s;
        }
        .emoji > svg {
            margin: 15px 0; 
            width: 70px;
            height: 70px;
            flex-shrink: 0;
        }

        #rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
        #rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
        #rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
        #rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
        #rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }
        .feedback {
            max-width: 360px;
            background-color: #fff;
            width: 100%;
            padding: 30px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0,0,0,.05);
        }
    </style>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
                    <li class="breadcrumb-item"><a href="/mahasiswa/acara">Acara</a></li>
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
                <div class="badge badge-soft-primary font-size-13 font-weight-normal">{{ $acara->statusAcara->status }}</div>
            </h4>
        </div>
        <div class="col-sm-4 col-xl-6 text-sm-right">
            <div class="btn-group ml-2 d-none d-sm-inline-block">
                @if ($peserta)
                    @if ($acara->status_acara_id == 6)
                        <a href="/peserta/kelas/{{ $peserta->kelas_acara_id }}" class="btn btn-soft-success btn-sm"><i class="uil-arrow-to-right mr-1"></i>Masuk Kelas</a>
                    {{-- @else
                        <span class="btn btn-soft-dabger btn-sm">Kelas Belum dibuka</span> --}}
                    @endif
                @else
                    @if ($acara->status_acara_id == 2)
                        <button type="button" class="btn btn-soft-info btn-sm" data-toggle="modal" data-target="#daftarModal"><i class="uil uil-edit mr-1"></i>Daftar</button>
                    {{-- @else
                        <span class="btn btn-soft-dabger btn-sm">Pendaftaran ditutup</span> --}}
                    @endif
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
                                <i data-feather="user" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">{{ $acara->koordinator->kode_dosen }}</h4>
                                    <span class="text-muted">Koordinator</span>
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

                        {{-- <div class="tags">
                            <h6 class="font-weight-bold">Tags</h6>
                            <div class="text-uppercase">
                                <a href="#" class="badge badge-soft-primary mr-2">Html</a>
                                <a href="#" class="badge badge-soft-primary mr-2">Css</a>
                                <a href="#" class="badge badge-soft-primary mr-2">Bootstrap</a>
                                <a href="#" class="badge badge-soft-primary mr-2">JQuery</a>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="p-2 border rounded mb-2">
                                    <img class="img-fluid d-block" src="{{ asset('storage/'.$acara->thumbnail) }}">
                                </div>
                            </div>
                        </div>
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
                        <div class="assign team mt-4">
                            <h6 class="mt-0 header-title">Rating</h6>
                            <div class="text-muted mt-3">
                                @if ($rating_acara)
                                    <?php
                                        for ($i=0; $i < $rating_acara; $i++) { ?>
                                            <i class="fa-solid fa-star" style="color: #FCD93A;"></i> 
                                    <?php } ?>
                                    {{ number_format($rating_acara,1,',') }}
                                {{-- @else --}}
                                    
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            {{-- <h6 class="font-weight-bold">Thumbnail</h6> --}}

                            
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
                                    Rating & Komentar
                                </a>
                            </li>
                            @if ($peserta)
                                <li class="nav-item">
                                    <a href="#kelas" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        List Kelas
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content text-muted">
                            <div class="tab-pane show active" id="rating">
                                @if ($peserta)
                                    <form action="/mahasiswa/acara/{{ ($rating) ? 'rateUpdate/'.$rating->id : 'rateCreate' }}" method="post">
                                        @csrf
                                        <input type="hidden" name="acara_id" value="{{ $acara->id }}">
                                        <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">
                                        <h5 class="mb-4 pb-1 header-title">Berikan Rating & Komentar</h5>
                                        <div class="container-2">
                                            <div class="feedback">
                                                <div class="rating">
                                                    <input type="radio" name="rating" id="rating-5" value="5" @checked($rating && $rating->rating == 5)>
                                                    <label for="rating-5"></label>
                                                    <input type="radio" name="rating" id="rating-4" value="4" @checked($rating && $rating->rating == 4)>
                                                    <label for="rating-4"></label>
                                                    <input type="radio" name="rating" id="rating-3" value="3" @checked($rating && $rating->rating == 3)>
                                                    <label for="rating-3"></label>
                                                    <input type="radio" name="rating" id="rating-2" value="2" @checked($rating && $rating->rating == 2)>
                                                    <label for="rating-2"></label>
                                                    <input type="radio" name="rating" id="rating-1" value="1" @checked($rating && $rating->rating == 1)>
                                                    <label for="rating-1"></label>
                                                    <div class="emoji-wrapper">
                                                        <div class="emoji">
                                                            <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                                                <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                                                <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                                <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                                <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                                                <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                                <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                                <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                                            </svg>
                                                            <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                                                <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                                                <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                                                <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                                                <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                                                <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                                                <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                                                <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                                                <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                                            </svg>
                                                            <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                                                <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                                                <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                                                <g fill="#fff">
                                                                    <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                                    <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                                                </g>
                                                                <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                                                <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                                            </svg>
                                                            <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                <g fill="#fff">
                                                                    <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                                                    <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                                                </g>
                                                                <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                                <g fill="#fff">
                                                                    <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                                                    <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                                                </g>
                                                                <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                                <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                                            </svg>
                                                            <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                                <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                                                <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                                <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                                <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                                                <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                                <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                                                <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                                            </svg>
                                                            <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <g fill="#ffd93b">
                                                                    <circle cx="256" cy="256" r="256"/>
                                                                    <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                                                </g>
                                                                <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                                                <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                                                <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                                                <g fill="#38c0dc">
                                                                    <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                                                </g>
                                                                <g fill="#d23f77">
                                                                    <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                                                </g>
                                                                <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                                                <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                                                <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="d-flex mr-3">
                                                <a href="/mahasiswa/profil"> <img class="media-object rounded-circle avatar-sm" alt="" src="{{ asset("storage/".auth()->user()->foto) }}"> </a>
                                            </div>
                                            <div class="media-body">
                                                <textarea type="text" class="form-control input-sm" name="komentar" id="komentar" placeholder="Berikan Komentar">{{ ($rating) ? $rating->komentar : '' }}</textarea>
                                                <button type="submit" class="btn btn-primary float-right mt-2">{{ ($rating) ? 'Simpan' : 'Kirim' }}</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
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
                            @if ($peserta)
                                <div class="tab-pane" id="kelas">
                                    <div id="task-list-one" class="task-list-items">
                                        @foreach ($list_kelas as $kelas)
                                            <!-- Task Item -->
                                            <div class="card border mb-0">
                                                <div class="card-body p-3">
                                                    <div class="dropdown float-right">
                                                        <a href="/peserta/kelas/{{ $kelas->id }}" class="dropdown-toggle text-muted arrow-none"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <i class="uil uil-ellipsis-v font-size-14"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!-- item-->
                                                            <a href="/peserta/kelas/{{ $kelas->id }}" class="dropdown-item"><i
                                                                    class="uil uil-arrow-right mr-2"></i>Masuk</a>
                                                        </div>
                                                    </div>
                                                    <h6 class="mt-0 mb-2 font-size-15">
                                                        <a href="/peserta/kelas/{{ $kelas->id }}" data-toggle="modal" data-target="#task-detail-modal"
                                                            class="text-body">Kelas {{ $kelas->nama }}</a>
                                                    </h6>
                                                    @if ($kelas->id == $peserta->kelas_acara_id)
                                                        <span class="badge badge-soft-primary">Kelas Saya</span>
                                                    @endif
                                                    <p>
                                                        Instruktur : {{ $kelas->instruktur->user->nama }}
                                                        {{-- Instruktur : {{ $kelas->instrukturAcara->dosen->user->nama }} --}}
                                                    </p>

                                                    <p class="mb-0 mt-4">
                                                        <img src="{{ asset("storage/".$kelas->instruktur->user->foto) }}" alt="user-img"
                                                        {{-- <img src="{{ asset("storage/".$kelas->instrukturAcara->dosen->user->foto) }}" alt="user-img" --}}
                                                            class="avatar-xs rounded-circle mr-2" />

                                                        <span class="text-nowrap align-middle font-size-13 mr-2">
                                                            <i class="uil uil-comments-alt text-muted mr-1"></i>{{ $kelas->jadwalAcara->count() }}
                                                        </span>
                                                        {{-- <span class="text-nowrap align-middle font-size-13">
                                                            <i class="uil uil-check-square mr-1 text-muted"></i>1/4
                                                        </span> --}}
                                                        <small class="float-right text-muted">{{ Carbon::parse($kelas->updated_at)->translatedFormat('d F Y') }}</small>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->
                                        @endforeach
                                    </div>
                                </div>
                                
                            @endif
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
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="/mahasiswa/acara/{{ $a->id }}" class="text-dark">{{ $a->nama }}</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">{{ Str::limit(strip_tags($a->deskripsi), 35, '...') }}</p>
                                    </div>
                                </div>
                            </li>    
                        @endforeach
                    </ul>
                    <div class="text-center">
                        <a href="/mahasiswa/acara" class="btn btn-sm border btn-white">
                            <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                            Load more
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-0 header-title"></h6>
                    @if ($peserta)
                        @if ($acara->status_acara_id == 6 && $peserta->kelas_acara_id)
                            <a href="/peserta/kelas/{{ $peserta->kelas_acara_id }}" class="btn btn-primary btn-block"><i class="uil uil-arrow-to-right mr-1"></i>Masuk Kelas</a>
                        @else
                            <span class="btn btn-danger btn-block">Kelas Belum dibuka</span>
                        @endif
                            <a href="/peserta/invoice/{{ $peserta->id }}" class="btn btn-success btn-block"><i class="uil uil-invoice mr-1"></i>Lihat Tagihan</a>
                        @if (isset($peserta->nilai))
                            <a href="/get?file=sertifikat&image={{ $peserta->nilai->sertifikat }}" class="btn btn-info btn-block">Unduh Sertifikat</a>
                        @endif
                    @else
                        @if ($acara->status_acara_id == 2)
                            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#daftarModal"><i class="uil uil-edit mr-1"></i>Daftar</button>
                        @else
                            <span class="btn btn-danger btn-block">Pendaftaran ditutup</span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="daftarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="daftarModalLabel">Daftar Pelatihan/Sertifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/peserta" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="acara_id" value="{{ $acara->id }}">
                        <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                        <input type="hidden" name="tagihan" value="{{ $acara->biaya }}">
                        <div class="form-group mb-2">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->user->nama }}" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="tagihan">Tagihan</label>
                            <input type="text" class="form-control" name="tagihanx" value="Rp.{{ number_format($acara->biaya,2,',','.') }}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
