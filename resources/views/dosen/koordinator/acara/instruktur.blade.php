@extends('dosen.layouts.main')
@section('container')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/koordinator/acara/{{ $acara->id }}">Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Instruktur</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Instruktur</h4>
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
                    <h4 class="header-title mt-0 mb-1">Data Instruktur</h4>
                    {{-- <div class="table-responsive col-lg-12"> --}}
                        <table class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Dosen</th>
                                    <th scope="col">NIDN</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_instruktur as $instruktur)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $instruktur->kode_dosen }}</td>
                                        <td>{{ $instruktur->nidn }}</td>
                                        <td>{{ $instruktur->nip }}</td>
                                        <td>{{ $instruktur->user->nama }}</td>
                                        <td>
                                            <form action="/koordinator/acara/instruktur/hapus/" method="post">
                                                @csrf
                                                <input type="hidden" name="dosen_id" value="{{ $instruktur->dosen_id }}">
                                                <input type="hidden" name="acara_id" value="{{ $instruktur->acara_id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Data Dosen</h4>
                    {{-- <div class="table-responsive col-lg-12"> --}}
                        <table class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Dosen</th>
                                    <th scope="col">NIDN</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_dosen as $dosen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dosen->kode_dosen }}</td>
                                        <td>{{ $dosen->nidn }}</td>
                                        <td>{{ $dosen->nip }}</td>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>
                                            <form action="/koordinator/acara/instruktur/tambah/" method="post">
                                                @csrf
                                                <input type="hidden" name="acara_id" value="{{ $acara->id }}">
                                                <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
                                                <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection