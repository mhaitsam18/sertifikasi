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
                    <li class="breadcrumb-item active" aria-current="page">Data Tagihan</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Data Tagihan</h4>
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
                    <h6 class="mt-0 header-title">Data Tagihan</h6>
                    <div class="table-responsive col-lg-12">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. Tagihan</th>
                                    <th scope="col">Nama Acara</th>
                                    <th scope="col">Jumlah Tagihan</th>
                                    <th scope="col">Sisa Tagihan</th>
                                    <th scope="col">Tanggal Tagihan</th>
                                    <th scope="col">Batas Waktu</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Status Peserta</th>
                                    <th scope="col">Status Tagihan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_invoice as $invoice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>inv{{ $invoice->acara_id.$invoice->mahasiswa_id.$invoice->id }}</td>
                                        <td>{{ $invoice->acara->nama }}</td>
                                        <td>Rp.{{ number_format($invoice->tagihan,2,',','.') }}</td>
                                        <td>Rp.{{ number_format($invoice->sisa_tagihan,2,',','.') }}</td>
                                        <td>{{ Carbon::parse($invoice->created_at)->translatedFormat('d F Y H:i:s') }}</td>
                                        <td>{{ Carbon::parse(date('Y-m-d', strtotime('+2 days', strtotime( $invoice->created_at ))))->translatedFormat('d F Y') }}</td>
                                        <td>
                                            @if (!$invoice->kelas_acara_id)
                                                <span class="badge badge-soft-secondary py-1">
                                                    Belum mendapatkan Kelas
                                                </span>
                                            @else
                                                <span class="badge badge-soft-primary py-1">
                                                    Kelas {{ $invoice->kelasAcara->nama }}
                                                </span>
                                            @endif
                                                
                                        </td>
                                        <td>{{ $invoice->statusPeserta->status }}</td>
                                        <td>
                                            @if ($invoice->sisa_tagihan > 0)
                                                <span class="badge badge-soft-danger py-1">
                                                    Belum Lunas
                                                </span>
                                            @else
                                                <span class="badge badge-soft-success py-1">
                                                    Sudah Lunas
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/peserta/invoice/{{ $invoice->id }}" class="btn btn-primary btn-sm">Lihat Invoice</a>
                                            @if ($invoice->sisa_tagihan > 0)
                                                <a href="/peserta/bayar?peserta_id={{ $invoice->id }}" class="btn btn-success btn-sm">Bayar</a>
                                            @else
                                                <span class="btn btn-success btn-sm">Lunas</span>
                                            @endif
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
