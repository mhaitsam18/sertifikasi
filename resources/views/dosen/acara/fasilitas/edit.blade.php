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
                    <li class="breadcrumb-item"><a href="/koordinator/acara/fasilitas?acara_id={{ $acara->id }}">Fasilitas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Edit</h4>
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
                    <h4 class="header-title mt-0 mb-1">Fasilitas: "{{ $acara->nama }}" - Ubah Data Fasilitas</h4>
                    <form action="/koordinator/acara/fasilitas/{{ $fasilitas->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="acara_id" value="{{ $fasilitas->acara_id }}">
                        <div class="form-group">
                            <label for="fasilitas">Nama Fasilitas</label>
                            <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" id="fasilitas" required autofocus value="{{ old('fasilitas', $fasilitas->fasilitas) }}">
                            @error('fasilitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required>{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
