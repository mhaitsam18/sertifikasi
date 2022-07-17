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
                    <li class="breadcrumb-item"><a href="/dosen/acara">Acara</a></li>
                    {{-- <li class="breadcrumb-item"><a href="/dosen/acara/{{ $acara->id }}">Acara</a></li> --}}
                    @if ($kelas)
                        <li class="breadcrumb-item"><a href="/dosen/kelasAcara?acara_id={{ $acara->id }}">Kelas</a></li>
                    @endif
                    <li class="breadcrumb-item"><a href="/dosen/jadwalAcara?acara_id={{ $acara->id }}{{ ($kelas) ? "&kelas_id=".$kelas->id : '' }}">Jadwal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Ubah Jadwal</h4>
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
                    <h4 class="header-title mt-0 mb-1">Ubah Jadwal Acara Pelatihan/Sertifikasi "{{ $acara->nama }}"</h4>
                    @if ($kelas)
                        <h4 class="header-title mt-0 mb-1">Kelas: {{ $kelas->nama }}</h4>
                    @endif
                    <form action="/dosen/jadwalAcara/{{ $jadwal->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="acara_id" value="{{ $acara->id }}">
                        <div class="form-group">
                            <label for="kelas_acara_id">Kelas</label>
                            <select class="form-control @error('kelas_acara_id') is-invalid @enderror" name="kelas_acara_id" id="kelas_acara_id">
                                <option value="all">Semua Kelas</option>
                                @foreach ($list_kelas as $k)
                                    @if ($k->id == old('kelas_acara_id', $jadwal->kelas_acara_id))
                                        @if (!$kelas)
                                            <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
                                        @elseif ($k->id == $kelas->id)
                                            <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kelas_acara_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instruktur_id">Pengajar</label>
                            <select class="form-control @error('instruktur_id') is-invalid @enderror" name="instruktur_id" id="instruktur_id" required>
                                <option value="" selected disabled>Pilih Instruktur</option>
                                <option value="each">Dengan Instruktur Kelas Masing-masing</option>
                                @foreach ($list_instruktur as $instruktur)
                                    @if ($instruktur->dosen_id == old('instruktur_id', $jadwal->instruktur_id))
                                        <option value="{{ $instruktur->id }}" selected>{{ $instruktur->kode_dosen ." | ". $instruktur->user->nama }}</option>
                                    @else
                                        <option value="{{ $instruktur->id }}">{{ $instruktur->kode_dosen ." | ". $instruktur->user->nama }}</option>
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
                            <label for="ruangan">Ruangan</label>
                            <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="ruangan" id="ruangan" required value="{{ old('ruangan', $jadwal->ruangan) }}">
                            @error('ruangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link Virtual (Jika ada)</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{ old('link', $jadwal->link) }}">
                            @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="materi">Materi</label>
                            <input type="text" class="form-control @error('materi') is-invalid @enderror" name="materi" id="materi" required value="{{ old('materi', $jadwal->materi) }}">
                            @error('materi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" required value="{{ old('tanggal', $jadwal->tanggal) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="waktu_dimulai">Waktu dimulai</label>
                                <input type="time" class="form-control @error('waktu_dimulai') is-invalid @enderror" name="waktu_dimulai" id="waktu_dimulai" required value="{{ old('waktu_dimulai', $jadwal->waktu_dimulai) }}">
                                @error('waktu_dimulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" id="waktu_selesai" required value="{{ old('waktu_selesai', $jadwal->waktu_selesai) }}">
                                @error('waktu_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status_jadwal_id">Status Jadwal</label>
                            <select class="form-control @error('status_jadwal_id') is-invalid @enderror" name="status_jadwal_id" id="status_jadwal_id" required>
                                <option value="" selected disabled>Pilih Status</option>
                                @foreach ($list_status as $status)
                                    @if ($status->id == old('status_jadwal_id', $jadwal->status_jadwal_id))
                                        <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                                    @else
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('status_jadwal_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required>{{ old('keterangan', $jadwal->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" name="is_ujian" id="is_ujian">
                            <label class="form-check-label" for="is_ujian">
                                Ujian?
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection