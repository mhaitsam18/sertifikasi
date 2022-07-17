@extends('dosen.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title d-print-none">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/instruktur">Instruktur</a></li>
                    <li class="breadcrumb-item"><a href="/instruktur/acara/{{ $acara->id }}">Acara</a></li>
                    {{-- <li class="breadcrumb-item"><a href="/dosen/instruktur">Instruktur</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Kelas : {{ $kelas->nama }}</h4>
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
    <div class="row mt-3">
        <div class="col-lg-12">
            <h5 class="mb-5">Jadwal Kelas</h5>
            <div class="left-timeline pl-4">
                <ul class="list-unstyled events">
                    @foreach ($list_jadwal as $jadwal)
                        <li class="event-list">
                            <div>
                                <div class="media">
                                    <div class="event-date text-center mr-4">
                                        <div class=" avatar-sm rounded-circle bg-soft-primary">
                                            <span class="font-size-16 avatar-title text-primary font-weight-semibold">
                                                {{ Carbon::parse($jadwal->tanggal)->translatedFormat('d') }}
                                            </span>
                                        </div>
                                        <p class="mt-2">{{ Carbon::parse($jadwal->tanggal)->translatedFormat('M') }}</p>
                                    </div>
                                    <div class="media-body">
                                        <div class="card d-inline-block">
                                            <div class="card-body">
                                                <h5 class="mt-0">{{ $jadwal->materi }}</h5>
                                                <p class="text-muted">{{ $jadwal->keterangan }}</p>
                                                
                                                <ul class="text-muted">
                                                    <li class="py-1">Instruktur / Pengajar : {{ $jadwal->instruktur->user->nama }}</li>
                                                    <li class="py-1">Ruangan : {{ $jadwal->ruangan }}</li>
                                                    <li class="py-1">Link : {{ $jadwal->link }}</li>
                                                    <li class="py-1">Materi : {{ $jadwal->materi }}</li>
                                                    <li class="py-1">Waktu Acara : {{ Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y').' '.$jadwal->waktu_dimulai.' s/d '.$jadwal->waktu_selesai }}</li>
                                                    <li class="py-1">Status : <span class="badge badge-{{ ($jadwal->status_jadwal_id == 3 || $jadwal->status_jadwal_id == 4) ? 'danger' : 'primary' }}">{{ $jadwal->statusJadwal->status }}</span></li>
                                                    <li class="py-1">
                                                        Kategori : 
                                                        @if ($jadwal->is_ujian)
                                                            <span class="badge badge-info">Ujian</span>
                                                        @else
                                                            <span class="badge badge-success">Reguler</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                                <div class="d-inline">
                                                    <form action="" class="form-inline">
                                                        @if ($jadwal->link != '#' && $jadwal->link != '')
                                                            <a href="{{ $jadwal->link }}" target="_blank" class="btn btn-primary btn-sm mr-2">Buka Link Virtual</a>
                                                        @endif
                                                        @if ($jadwal->jumlah_bap)
                                                            <a href="/berita-acara/{{ $jadwal->id_bap }}" class="btn btn-info btn-sm mr-2">Lihat BAP</a>
                                                        @else
                                                            <a href="/berita-acara/create/{{ $jadwal->id }}" class="btn btn-info btn-sm">Input BAP</a>
                                                        @endif
                                                        <div class="form-group ml-3">
                                                            <select name="status_jadwal" id="status_jadwal" onchange="" class="form-control status_jadwal" data-id="{{ $jadwal->id }}">
                                                                @foreach ($list_status as $status)
                                                                    @if ($status->id == $jadwal->status_jadwal_id)
                                                                        <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                                                                    @else
                                                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>

    </div>
    <!-- end row -->
    
    {{-- <div class="row mt-5">
        <div class="col-12">
            <h5 class="text-center mb-5">Center Timeline</h5>
            <div class="timeline" dir="ltr">

                <article class="timeline-item">
                    <h2 class="m-0 d-none">&nbsp;</h2>
                    <div class="time-show mt-0">
                        <a href="#" class="btn btn-primary width-lg">Today</a>
                    </div>
                </article>
                @foreach ($list_jadwal as $jadwal)
                    <article class="timeline-item @if ($loop->iteration % 2 != 0) timeline-item-left @endif">
                        <div class="timeline-desk">
                            <div class="timeline-box clearfix">
                                <span class="timeline-icon"></span>
                                <div class="event-date {{ ($loop->iteration % 2 != 0) ? 'float-right' : 'float-left' }} text-center ml-4">
                                    <div class=" avatar-sm rounded-circle bg-soft-primary">
                                        <span class="font-size-16 avatar-title text-primary font-weight-semibold">
                                            {{ Carbon::parse($jadwal->tanggal)->translatedFormat('d') }}
                                        </span>
                                    </div>
                                    <p class="mt-2">{{ Carbon::parse($jadwal->tanggal)->translatedFormat('M') }}</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">{{ $jadwal->materi }}</h5>
                                            <p class="text-muted">{{ $jadwal->keterangan }}</p>
                                            
                                            <ul class="text-muted">
                                                <li class="py-1">Instruktur / Pengajar : {{ $jadwal->instruktur->user->nama }}</li>
                                                <li class="py-1">Ruangan : {{ $jadwal->ruangan }}</li>
                                                <li class="py-1">Link : {{ $jadwal->link }}</li>
                                                <li class="py-1">Materi : {{ $jadwal->materi }}</li>
                                                <li class="py-1">Waktu Acara : {{ Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y').' '.$jadwal->waktu_dimulai.' s/d '.$jadwal->waktu_selesai }}</li>
                                                <li class="py-1">Status : <span class="badge badge-{{ ($jadwal->status_jadwal_id == 3 || $jadwal->status_jadwal_id == 4) ? 'danger' : 'primary' }}">{{ $jadwal->statusJadwal->status }}</span></li>
                                                <li class="py-1">
                                                    Kategori : 
                                                    @if ($jadwal->is_ujian)
                                                        <span class="badge badge-info">Ujian</span>
                                                    @else
                                                        <span class="badge badge-success">Reguler</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <div class="d-inline">
                                                <form action="" class="form-inline">
                                                    @if ($jadwal->link != '#' && $jadwal->link != '')
                                                        <a href="{{ $jadwal->link }}" target="_blank" class="btn btn-primary btn-sm">Buka Link Virtual</a>
                                                    @endif
                                                    @if ($jadwal->jumlah_bap)
                                                        <a href="/berita-acara/{{ $jadwal->id_bap }}" class="btn btn-info btn-sm">Lihat BAP</a>
                                                    @else
                                                        <a href="/berita-acara/create/{{ $jadwal->id }}" class="btn btn-info btn-sm">Input BAP</a>
                                                    @endif
                                                    <div class="form-group ml-3">
                                                        <select name="status_jadwal" id="status_jadwal" onchange="" class="form-control status_jadwal" data-id="{{ $jadwal->id }}">
                                                            @foreach ($list_status as $status)
                                                                @if ($status->id == $jadwal->status_jadwal_id)
                                                                    <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                                                                @else
                                                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </div> --}}
    <!-- end row -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="/jquery/jquery.min.js"></script>
    <script src="/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script type="text/javascript">
        $('.status_jadwal').on('change', function() {
            const jadwal_acara_id = $(this).data('id');
            const status_jadwal_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/acara/ubahStatusJadwal",
                type: 'post',
                data: {
                    jadwal_acara_id: jadwal_acara_id,
                    status_jadwal_id: status_jadwal_id
                },
                success: function() {
                    document.location.href = "/instruktur/jadwal/<?= $acara->id ?>";
                }
            });
            
        });
        
    </script>
@endsection
