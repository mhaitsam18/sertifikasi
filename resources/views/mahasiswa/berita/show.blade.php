@extends('mahasiswa.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
?>
    <style>
        .like {
            display: flex;
            justify-content: center;
            margin: 0;
            /* height: 100vh; */
        }
        [id="heart"] {
            position: absolute;
            left: -100vw;
        }
        [for="heart"] {
            color: #aab8c2;
            cursor: pointer;
            font-size: 2em;
            align-self: center;  
            transition: color 0.2s ease-in-out;
        }
        [for="heart"]:hover {
            color: grey;
        }
        [for="heart"]::selection {
            color: none;
            background: transparent;
        }
        [for="heart"]::moz-selection {
            color: none;
            background: transparent;
        }
        [id="heart"]:checked + label {
            color: #e2264d;
            will-change: font-size;
            animation: heart 1s cubic-bezier(.17, .89, .32, 1.49);
        }
        @keyframes heart {0%, 17.5% {font-size: 0;}}
    </style>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
                    <li class="breadcrumb-item"><a href="/mahasiswa/berita">Berita</a></li>
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
                {{ $berita->judul }}
                {{-- <div class="badge badge-success font-size-13 font-weight-normal"> - </div> --}}
                {{-- <div class="badge badge-soft-primary font-size-13 font-weight-normal"> - </div> --}}
            </h4>
        </div>
        <div class="col-sm-4 col-xl-6 text-sm-right">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body p-0">
                    <h6 class="card-title border-bottom p-3 mb-0 header-title">Ulasan Berita</h6>
                    <div class="row py-1">
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 1 -->
                            <div class="media p-3">
                                <i data-feather="eye" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">{{ $berita->views }}</h4>
                                    <span class="text-muted font-size-13">Views</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 2 -->
                            <div class="media p-3">
                                <i data-feather="heart" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">{{ $like_berita }}</h4>
                                    <span class="text-muted">Likes</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 3 -->
                            <div class="media p-3">
                                <i data-feather="user" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">Penulis</h4>
                                    <span class="text-muted">{{ $berita->penulis->nama }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <!-- stat 3 -->
                            <div class="media p-3">
                                <i data-feather="grid" class="align-self-center icon-dual icon-lg mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">Berita</h4>
                                    <span class="text-muted">Kategori</span>
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
                    <h6 class="mt-0 header-title">{{ $berita->judul }}</h6>

                    <div class="text-muted mt-3">
                        {!! $berita->isi !!}
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
                        <div class="mt-4">
                            {{-- <h6 class="font-weight-bold">Thumbnail</h6> --}}

                            <div class="row">
                                <div class="col-xl-9 col-md-9">
                                    <div class="p-2 border rounded mb-2">
                                        <img class="img-fluid d-block" src="{{ asset('storage/'.$berita->thumbnail) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calender text-danger"></i> dibuat pada</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($berita->created_at)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> diterbitkan pada</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($berita->publish_at)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-4">
                                    <p class="mb-2"><i class="uil-calender text-danger"></i> terakhir disunting</p>
                                    <h5 class="font-size-16">{{ Carbon::parse($berita->updated_at)->translatedFormat('d F Y H:i') }}</h5>
                                </div>
                            </div>
                        </div>
                        

                        <div class="assign team mt-4">
                            <h6 class="font-weight-bold">dilihat oleh</h6>
                            <h6 class="font-weight-bold float-right">Like</h6>
                            <div class="d-flex">
                                {{-- @foreach ($list_instruktur as $instruktur)
                                    <a href="" class="align-content-center">
                                        <p class="text-center">
                                            <img src="{{ asset("storage/".$instruktur->user->foto) }}" alt="" class="avatar-sm m-1 rounded-circle">
                                            <br>
                                            {{ $instruktur->kode_dosen }}
                                        </p>
                                    </a>
                                @endforeach --}}
                            </div>
                        </div>
                        <div class="row" style="height: 35px;">
                            <div class="col-md-11"></div>
                            <div class="col-md-1">
                                <div class="like">
                                    <input id="heart" type="checkbox" data-id="{{ $berita->id }}" @checked($like)>
                                    <label for="heart" class="label-heart" data-id="{{ $berita->id }}">❤</label>
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
                                <a href="#komentar" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Komentar
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content text-muted">
                            <div class="tab-pane show active" id="komentar">
                                <h5 class="mb-4 pb-1 header-title">Comments ({{ $list_komentar->count() }})</h5>
                                @if ($list_komentar->count())
                                    @foreach ($list_komentar as $komentar)
                                        <div class="media mb-4 font-size-14">
                                            <div class="mr-3">
                                                <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="{{ asset("storage/".$komentar->user->foto) }}"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 font-size-15">
                                                    {{ $komentar->user->nama }} 
                                                </h5>
                                                <p class="text-muted mb-1">
                                                    {{ $komentar->komentar }}
                                                </p>
                                                <p>
                                                    <span class="text-muted">{{ Carbon::parse($komentar->created_at)->translatedFormat('d/m/Y H:i:s') }}</span>
                                                </p>
                                                {{-- <hr> --}}
                                                <a href="#" class="text-primary mr-2">Balas</a>
                                                @if ($komentar->user_id == auth()->user()->id)
                                                    <a href="#" class="text-primary mr-2">Edit</a>
                                                    <a href="berita/komentar/hapus" class="text-primary mr-2">Hapus</a>
                                                @endif
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
                                
                                
                                <div class="media">
                                    <div class="d-flex mr-3">
                                        <a href="/profile"> <img class="media-object rounded-circle avatar-sm" alt="profile" src="{{ asset("storage/".auth()->user()->foto) }}"> </a>
                                    </div>
                                    <div class="media-body">
                                        <form action="/mahasiswa/berita/komentar" method="post">
                                            @csrf
                                            <input type="hidden" name="berita_id" id="berita_id" value="{{ $berita->id }}">
                                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                                            <textarea class="form-control input-sm" name="komentar" id="komentar" placeholder="Tulis komentar..."></textarea>
                                            <button type="submit" class="btn btn-primary btn-sm mt-2 float-right">Kirim</button>
                                        </form>
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
                    <h6 class="mt-0 header-title">berita Lainnya</h6>

                    <ul class="list-unstyled activity-widget">
                        @foreach ($list_berita as $a)
                            <li class="activity-list">
                                <div class="media">
                                    <div class="text-center mr-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">{{ Carbon::parse($a->publish_at)->translatedFormat('d') }}</span>
                                        </div>
                                        <p class="text-muted font-size-13 mb-0">{{ Carbon::parse($a->publish_at)->translatedFormat('M') }}</p>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="/mahasiswa/berita/{{ $a->slug }}" class="text-dark">{{ $a->judul }}</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">{{ Str::limit(strip_tags($a->isi), 35, '...') }}</p>
                                    </div>
                                </div>
                            </li>    
                        @endforeach
                    </ul>
                    <div class="text-center">
                        <a href="/mahasiswa/berita" class="btn btn-sm border btn-white">
                            <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                            Load more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="/jquery/jquery.min.js"></script>
    <script src="/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script type="text/javascript">
        $('.label-heart').on('click', function() {
            const berita_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/mahasiswa/berita/like",
                type: 'post',
                data: {
                    berita_id: berita_id,
                },
                success: function() {
                }
            });
            
        });
        
    </script>
    <!-- end row -->
@endsection
