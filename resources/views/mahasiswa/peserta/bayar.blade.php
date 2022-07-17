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
                    <li class="breadcrumb-item"><a href="/peserta/invoice?peserta_id={{ $peserta->id }}">Tagihan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bayar</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Bayar</h4>
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
                    <h6 class="mt-0 header-title">Form Pembayaran</h6>
                    <h5 class="mt-0 header-title">No. Tagihan: inv{{ $peserta->acara_id.$peserta->mahasiswa_id.$peserta->id }}</h5>
                    <div class="text-muted mt-3">
                        <p>
                            Kepada yth. {{ $peserta->mahasiswa->user->nama }}
                        </p>
                        <p>
                            Silahkan melakukan Pembayaran ke Rekening berikut ini, kemudian upload bukti pembayaran Anda pada formulir di bawah ini
                        </p>
                        <ul>
                            @foreach ($list_rekening as $rekening)
                                <li>{{ $rekening->nomor_rekening }} | {{ $rekening->bank }} | {{ $rekening->atas_nama }} | {{ $rekening->email }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <form action="/peserta/bayar" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">
                        <div class="form-group">
                            <label for="rekening_tujuan_id">Rekening Tujuan</label>
                            <select class="form-control @error('rekening_tujuan_id') is-invalid @enderror" name="rekening_tujuan_id" id="rekening_tujuan_id">
                                <option value="" selected disabled>Pilih Rekening</option>
                                @foreach ($list_rekening as $rekening)
                                    <option value="{{ $rekening->id }}" {{ ($rekening->id == old('rekening_tujuan_id')) ? "selected" : '' }}>{{ $rekening->nomor_rekening }} | {{ $rekening->bank }} | {{ $rekening->atas_nama }}</option>
                                @endforeach
                            </select>
                            @error('rekening_tujuan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rekening_pengirim">Rekening Pengirim</label>
                            <input type="number" class="form-control @error('rekening_pengirim') is-invalid @enderror" name="rekening_pengirim" id="rekening_pengirim"  value="{{ old('rekening_pengirim') }}">
                            @error('rekening_pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank_pengirim">Bank Pengirim</label>
                            <input type="text" class="form-control @error('bank_pengirim') is-invalid @enderror" name="bank_pengirim" id="bank_pengirim"  value="{{ old('bank_pengirim') }}">
                            @error('bank_pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_pengirim">Nama Pengirim</label>
                            <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" name="nama_pengirim" id="nama_pengirim"  value="{{ old('nama_pengirim') }}">
                            @error('nama_pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group row">
                            <div class="col">
                                <label for="tanggal_transfer">Tanggal Transfer</label>
                                <input type="date" class="form-control @error('tanggal_transfer') is-invalid @enderror" name="tanggal_transfer" id="tanggal_transfer" value="{{ old('tanggal_transfer') }}">
                                @error('tanggal_transfer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="waktu_transfer">Waktu Transfer</label>
                                <input type="time" class="form-control @error('waktu_transfer') is-invalid @enderror" name="waktu_transfer" id="waktu_transfer" value="{{ old('waktu_transfer') }}">
                                @error('waktu_transfer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nominal_transfer">Nominal Transfer</label>
                            <input type="number" class="form-control @error('nominal_transfer') is-invalid @enderror" name="nominal_transfer" id="nominal_transfer" value="{{ old('nominal_transfer', $peserta->sisa_tagihan) }}">
                            @error('nominal_transfer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bukti">Bukti Pembayaran</label>
                            <input type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti" id="bukti" value="{{ old('bukti') }}">
                            @error('bukti')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" >{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
