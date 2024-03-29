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
                    <li class="breadcrumb-item"><a href="/koordinator/acara/kelas-acara?acara_id={{ $acara->id }}">Kelas</a></li>
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
                    <h4 class="header-title mt-0 mb-1">Kelas: "{{ $acara->nama }}" - Ubah Data Kelas</h4>
                    <form action="/koordinator/acara/kelas-acara/{{ $kelas->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="acara_id" value="{{ $kelas->acara_id }}">
                        <div class="form-group">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" required autofocus value="{{ old('nama', $kelas->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instruktur_id">Instruktur</label>
                            <select class="form-control @error('instruktur_id') is-invalid @enderror" name="instruktur_id" id="instruktur_id" required>
                                <option value="" selected disabled>Pilih Instruktur</option>
                                @foreach ($list_instruktur as $instruktur)
                                    @if ($instruktur->dosen_id == old('instruktur_id', $kelas->instruktur_id))
                                        <option value="{{ $instruktur->instruktur_id }}" selected>{{ $instruktur->kode_dosen ." | ". $instruktur->user->nama }}</option>
                                    @else
                                        <option value="{{ $instruktur->instruktur_id }}">{{ $instruktur->kode_dosen ." | ". $instruktur->user->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('instruktur_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kuota">Kuota</label>
                            <input type="text" class="form-control @error('kuota') is-invalid @enderror" name="kuota" id="kuota" required autofocus value="{{ old('kuota', $kelas->kuota) }}">
                            @error('kuota')
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
