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
                    @if ($acara)
                        <li class="breadcrumb-item"><a href="/instruktur/acara/{{ $acara->id }}">Acara</a></li>
                        @if ($jadwal)
                            <li class="breadcrumb-item"><a href="/instruktur/jadwal/{{ $kelas->id }}">Jadwal</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="/instruktur/berita-acara?kelas_acara_id={{ $acara->id }}">Berita Acara</a></li>
                        @endif
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">Input BAP</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Input Berita Acara | Kelas {{ $kelas->nama }} | </h4>
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="/instruktur/berita-acara" method="post">
                        @csrf
                        <h4 class="mb-3 header-title mt-0">Presensi</h4>
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Peserta</th>
                                    <th scope="col">Kehadiran</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($list_peserta->count())
                                    @foreach ($list_peserta as $peserta)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $peserta->mahasiswa->nim }}</td>
                                            <td>{{ $peserta->mahasiswa->user->nama }}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="hidden" name="peserta_id[{{ $loop->iteration - 1 }}]" value="{{ $peserta->id }}" id="peserta_id_{{ $peserta->id }}">
                                                    <input type="checkbox" class="custom-control-input peserta peserta_id" id="is_present_{{ $peserta->id }}" name="is_present[{{ $loop->iteration - 1 }}]" value="1">
                                                    <label class="custom-control-label" for="is_present_{{ $peserta->id }}">Hadir</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="keterangan[{{ $loop->iteration - 1 }}]" id="keterangan_{{ $peserta->id }}" value="">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <input type="hidden" name="peserta_id[]" value="" id="peserta_id">
                                    <tr>
                                        <th scope="row" colspan="5">Data Tidak ditemukan</th>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="row" colspan="3"></th>
                                    <th>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input peserta" name="select-all" id="select-all" onclick="toggle(this)">
                                            <label class="custom-control-label" for="select-all">Hadir Semua</label>
                                        </div>
                                    </th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                        <script>
                            // Listen for click on toggle checkbox
                            $('#select-all').click(function(event) {   
                                if(this.checked) {
                                    // Iterate each checkbox
                                    $(':checkbox').each(function() {
                                        this.checked = true;                        
                                    });
                                } else {
                                    $(':checkbox').each(function() {
                                        this.checked = false;                       
                                    });
                                }
                            });

                            $('.peserta').click(function(event) {   
                                var total_kehadiran = $(".peserta_id:checked").length;
                                var total_alpa = $(".peserta_id:not(:checked)").length;
                                $('#total_kehadiran').val(total_kehadiran);
                                $('#total_alpa').val(total_alpa);
                            });
                        </script>

                        <h4 class="mb-3 header-title mt-0">Form Berita Acara</h4>

                    
                        
                        <input type="hidden" name="jadwal_acara_id" id="jadwal_acara_id" value="{{ $jadwal->id }}">
                        <div class="form-group">
                            <label for="total_peserta">Total Peserta</label>
                            <input type="number" class="form-control @error('total_peserta') is-invalid @enderror" name="total_peserta" id="total_peserta" value="{{ old('total_peserta', $list_peserta->count()) }}" autofocus>
                        </div>
                        @error('total_peserta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="total_kehadiran">Total Kehadiran</label>
                            <input type="number" class="form-control @error('total_kehadiran') is-invalid @enderror" name="total_kehadiran" id="total_kehadiran" value="{{ old('total_kehadiran') }}">
                        </div>
                        @error('total_kehadiran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="total_izin">Total Izin</label>
                            <input type="number" class="form-control @error('total_izin') is-invalid @enderror" name="total_izin" id="total_izin" value="{{ old('total_izin') }}">
                        </div>
                        @error('total_izin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="total_alpa">Total Alpa</label>
                            <input type="number" class="form-control @error('total_alpa') is-invalid @enderror" name="total_alpa" id="total_alpa" value="{{ old('total_alpa') }}">
                        </div>
                        @error('total_alpa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" required>{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
@endsection
