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
                    {{-- @if ($acara)
                        <li class="breadcrumb-item"><a href="/instruktur/acara/{{ $acara->id }}">Acara</a></li>
                        @if ($jadwal)
                            <li class="breadcrumb-item"><a href="/instruktur/jadwal/{{ $kelas->id }}">Jadwal</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="/berita-acara/{{ $acara->id }}">Berita Acara</a></li>
                        @endif
                    @else
                    @endif --}}
                    <li class="breadcrumb-item"><a href="/berita-acara?kelas_acara_id={{ $beritaAcara->jadwalAcara->kelas_acara_id }}">Berita Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail BAP</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Detail BAP</h4>
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
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-sm-right">
                            <img src="assets/images/logo.png" alt="" height="48" />
                            <h4 class="m-0 d-inline align-middle">Sertifikasi</h4>
                            <address class="pl-2 mt-2">
                                Telkom University, Jl. Telekomunikasi No. 1, <br>
                                Terusan Buahbatu - Bojongsoang, Sukapura, <br>
                                Kec. Dayeuhkolot, Kabupaten Bandung, <br>
                                Jawa Barat 40257 <br>
                                <abbr title="Phone">P:</abbr> (022) 7564108
                            </address>
                        </div>
                        <div class="float-sm-left">
                            <h4 class="m-0 d-print-none">Berita Acara</h4>
                            <dl class="row mb-2 mt-3">
                                <dt class="col-sm-3 font-weight-normal">Nomor Berita :</dt>
                                <dd class="col-sm-9 font-weight-normal">#BAP{{ $beritaAcara->id }}</dd>

                                <dt class="col-sm-3 font-weight-normal">Jadwal Kelas:</dt>
                                <dd class="col-sm-9 font-weight-normal">{{ Carbon::parse($beritaAcara->jadwalAcara->tanggal)->translatedFormat('d F Y') }}</dd>
                                
                                <dt class="col-sm-3 font-weight-normal">Tanggal dibuat:</dt>
                                <dd class="col-sm-9 font-weight-normal">{{ Carbon::parse($beritaAcara->created_at)->translatedFormat('d F Y') }}</dd>
                            </dl>
                        </div>
                        
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <ul>
                                <li>Total Peserta : {{ $beritaAcara->total_peserta }}</li>
                                <li>Total Kehadiran : {{ $beritaAcara->total_kehadiran }}</li>
                                <li>Total Izin : {{ $beritaAcara->total_izin }}</li>
                                <li>Total Alpa : {{ $beritaAcara->total_alpa }}</li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <ul>
                                <li>Jam Kelas : {{ $beritaAcara->jadwalAcara->waktu_dimulai.' s/d '.$beritaAcara->jadwalAcara->waktu_selesai }}</li>
                                <li>Tanggal di Approve : {{ Carbon::parse(date('Y-m-d', strtotime('+2 days', strtotime( $beritaAcara->updated_at ))))->translatedFormat('d F Y') }}</li>
                            </ul>

                            
                            {{-- <ul>
                                <li>Total Izin : {{ $beritaAcara->total_izin }}</li>
                                <li>Total Alpa : {{ $beritaAcara->total_alpa }}</li>
                            </ul> --}}
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th>Presensi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_presensi as $presensi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $presensi->peserta->mahasiswa->nim }}</td>
                                                <td>{{ $presensi->peserta->mahasiswa->user->nama }}</td>
                                                <td>
                                                    @if ($presensi->is_present)
                                                        Hadir
                                                    @else
                                                        Tidak hadir
                                                    @endif
                                                </td>
                                                <td>{{ $presensi->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Catatan:</h6>

                                <small class="text-muted">
                                    {{ $beritaAcara->catatan }}
                                </small>
                            </div>
                        </div> <!-- end col -->
                        {{-- <div class="col-sm-6">
                            <div class="float-right mt-4">
                                <p><span class="font-weight-medium">Sub-total:</span> <span
                                        class="float-right">Rp. {{ number_format($beritaAcara->tagihan,2,',','.') }}</span></p>
                                <p><span class="font-weight-medium">Discount (0%):</span> <span
                                        class="float-right"> &nbsp;&nbsp;&nbsp; Rp. 0,00</span></p>
                                <h3>Rp. {{ number_format($beritaAcara->tagihan,2,',','.') }} IDR</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col --> --}}
                    </div>
                    <!-- end row -->

                    <div class="mt-5 mb-1">
                        <div class="text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="uil uil-print mr-1"></i> Cetak</a>
                            <a href="/instruktur/jadwal/{{ $beritaAcara->jadwalAcara->kelas_acara_id }}" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
