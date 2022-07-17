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
                    <li class="breadcrumb-item"><a href="/acara">Acara</a></li>
                    <li class="breadcrumb-item"><a href="/acara/{{ $peserta->acara_id }}">Detail</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tagihan</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Tagihan</h4>
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
                            <h4 class="m-0 d-print-none">Tagihan</h4>
                            <dl class="row mb-2 mt-3">
                                <dt class="col-sm-3 font-weight-normal">Nomor Tagihan :</dt>
                                <dd class="col-sm-9 font-weight-normal">#inv{{ $peserta->acara_id.$peserta->mahasiswa_id.$peserta->id }}</dd>

                                <dt class="col-sm-3 font-weight-normal">Tanggal Tagihan:</dt>
                                <dd class="col-sm-9 font-weight-normal">{{ Carbon::parse($peserta->created_at)->translatedFormat('d F Y') }}</dd>

                                <dt class="col-sm-3 font-weight-normal">Batas Waktu :</dt>
                                <dd class="col-sm-9 font-weight-normal">{{ Carbon::parse(date('Y-m-d', strtotime('+2 days', strtotime( $peserta->created_at ))))->translatedFormat('d F Y') }}</dd>
                            </dl>
                        </div>
                        
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6 class="font-weight-normal">Tagihan Untuk:</h6>
                            <h6 class="font-size-16">{{ $peserta->mahasiswa->user->nama }}</h6>
                            <address>
                                {{ $peserta->mahasiswa->user->alamat }} <br>
                                <abbr title="Phone">P:</abbr> {{ $peserta->mahasiswa->user->nomor_telepon }}
                            </address>
                        </div> <!-- end col -->

                        <div class="col-md-6">
                            <div class="text-md-right">
                                <h6 class="font-weight-normal">Total</h6>
                                <h2>Rp. {{ number_format($peserta->tagihan,2,',','.') }}</h2>
                            </div>
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
                                            <th>Item</th>
                                            <th style="width: 10%">Jumlah</th>
                                            <th style="width: 10%">Harga</th>
                                            <th style="width: 10%" class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <h5 class="font-size-16 mt-0 mb-2">{{ $peserta->acara->kategoriAcara->kategori }}</h5>
                                                <p class="text-muted mb-0">{{ $peserta->acara->nama }}</p>
                                            </td>
                                            <td>1</td>
                                            <td>Rp. {{ number_format($peserta->tagihan,2,',','.') }}</td>
                                            <td class="text-right">Rp. {{ number_format($peserta->tagihan,2,',','.') }}</td>
                                        </tr>
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
                                    Semua akun harus dibayar dalam waktu 2 hari sejak diterimanya Tagihan. Dibayar dengan cek atau kartu kredit atau pembayaran langsung online. Jika akun tidak dibayar dalam waktu 2 hari, rincian kredit yang diberikan sebagai konfirmasi pekerjaan yang dilakukan akan dikenakan biaya kutipan yang disepakati yang disebutkan di atas.
                                </small>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-right mt-4">
                                <p><span class="font-weight-medium">Sub-total:</span> <span
                                        class="float-right">Rp. {{ number_format($peserta->tagihan,2,',','.') }}</span></p>
                                <p><span class="font-weight-medium">Discount (0%):</span> <span
                                        class="float-right"> &nbsp;&nbsp;&nbsp; Rp. 0,00</span></p>
                                <h3>Rp. {{ number_format($peserta->tagihan,2,',','.') }} IDR</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-5 mb-1">
                        <div class="text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="uil uil-print mr-1"></i> Cetak</a>
                            @if ($peserta->sisa_tagihan > 0)
                                <a href="/peserta/bayar?peserta_id={{ $peserta->id }}" class="btn btn-info">Bayar</a>
                            @else
                                <span class="btn btn-success">Lunas</span>
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
