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
                    <li class="breadcrumb-item active" aria-current="page">List Pembayaran</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">List Pembayaran</h4>
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
                    <h6 class="mt-0 header-title">List Pembayaran</h6>
                    <div class="table-responsive col-lg-12">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Waktu Upload</th>
                                    <th scope="col">No. Tagihan</th>
                                    <th scope="col">Nama Acara</th>
                                    <th scope="col">Jumlah Tagihan</th>
                                    <th scope="col">Jumlah Transfer</th>
                                    <th scope="col">Status Validasi</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_pembayaran as $pembayaran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Carbon::parse($pembayaran->created_at)->translatedFormat('d F Y H:i:s') }}</td>
                                        <td>inv{{ $pembayaran->acara_id.$pembayaran->mahasiswa_id.$pembayaran->peserta_id }}</td>
                                        <td>{{ $pembayaran->nama }}</td>
                                        <td>Rp.{{ number_format($pembayaran->tagihan,2,',','.') }}</td>
                                        <td>Rp.{{ number_format($pembayaran->nominal_transfer,2,',','.') }}</td>
                                        <td>
                                            @if ($pembayaran->validasi == 0)
                                                <span class="badge badge-soft-secondary py-1">
                                                    Belum divalidasi
                                                </span>
                                            @elseif ($pembayaran->validasi == 1)
                                                <span class="badge badge-soft-success py-1">
                                                    Valid
                                                </span>
                                            @else
                                                <span class="badge badge-soft-danger py-1">
                                                    Tidak Valid
                                                </span>
                                            @endif
                                                
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Rekening Tujuan : {{ $pembayaran->nomor_rekening }} | {{ $pembayaran->bank }} | {{ $pembayaran->atas_nama }} | {{ $pembayaran->email }}</li>
                                                <li>Rekening Pengirim : {{ $pembayaran->rekening_pengirim }}</li>
                                                <li>Bank Pengirim : {{ $pembayaran->bank_pengirim }}</li>
                                                <li>Atas Nama : {{ $pembayaran->nama_pengirim }}</li>
                                                <li>Waktu Transfer : {{ Carbon::parse($pembayaran->waktu_transfer)->translatedFormat('d F Y H:i:s') }}</li>
                                                <li>Nominal Transfer : Rp.{{ number_format($pembayaran->nominal_transfer,2,',','.') }}</li>
                                                <li>Bukti Transfer : <a href="{{ asset('storage/'.$pembayaran->bukti) }}"><i class="uil  uil-download-alt"></i> Download File</a></li>
                                                <li>Catatan : {{ $pembayaran->catatan }}</li>
                                                <li>Keterangan Admin : {{ $pembayaran->Keterangan }}</li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
