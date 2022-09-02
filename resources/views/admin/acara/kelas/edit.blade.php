@extends('admin.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kelas Sertifikasi / Pelatihan</h1>
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
                    <form action="/dashboard/acara/kelas-acara/{{ $kelas->id }}" method="post">
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
