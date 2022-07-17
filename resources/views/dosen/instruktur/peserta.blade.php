@extends('dosen.layouts.main')
@section('container')
<?php 
use App\Models\Peserta;
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/instruktur">Instruktur</a></li>
                    <li class="breadcrumb-item"><a href="/instruktur/acara/{{ $acara->id }}">Acara</a></li>
                    {{-- <li class="breadcrumb-item"><a href="/dosen/instruktur">Instruktur</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Peserta</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Instruktur | Daftar Anggota Kelas : {{ $kelas->nama }}</h4>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-body">
                    <a href="javascript:window.history.go(-1);" class="btn btn-primary my-1">Kembali</a>
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Status Peserta</th>
                                <th scope="col">Nilai Akhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($list_peserta->count())
                                @foreach ($list_peserta as $peserta)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $peserta->mahasiswa->nim }}</td>
                                        <td>{{ $peserta->mahasiswa->user->nama }}</td>
                                        <td>{{ $peserta->statusPeserta->status }}</td>
                                        <td>
                                            @if (isset($peserta->nilai->nilai))
                                                {{ $peserta->nilai->nilai }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (!isset($peserta->nilai->nilai))
                                                <form class="form-inline" action="/instruktur/nilai" method="post">
                                                    @csrf
                                                    <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">
                                                    <input type="hidden" name="sertifikat" value=" ">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="nilai" class="sr-only">Masukkan Nilai</label>
                                                        <input type="number" class="form-control" name="nilai" id="nilai" placeholder="Masukkan Nilai">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            @else
                                                <form class="form-inline" action="/instruktur/nilai/{{ $peserta->nilai->id }}" method="post" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">
                                                    <input type="hidden" name="sertifikat" value="{{ $peserta->nilai->sertifikat }}">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="nilai" class="sr-only">Masukkan Nilai</label>
                                                        <input type="number" class="form-control" name="nilai" id="nilai" placeholder="Masukkan Nilai" value="{{ $peserta->nilai->nilai }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>
                                            @endif
                                        </td>
                                        {{-- <td>{{ $peserta->nilai->nilai }}</td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="4">Data Tidak ditemukan</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                
    </div>
    <!-- end row -->
    {{-- <div class="row mb-3 mt-2">
        <div class="col-12">
            <div class="text-center">
                <a href="javascript:void(0);" class="btn btn-white">
                    <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                    Load more
                </a>
            </div>
        </div> <!-- end col-->
    </div> --}}
    <!-- end row -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="/js/datatables-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
@endsection