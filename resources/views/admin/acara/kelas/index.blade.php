@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelas Sertifikasi / Pelatihan</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Data Kelas "{{ $acara->nama }}"</h4>
                    {{-- <div class="table-responsive col-lg-12"> --}}
                        <a href="/dashboard/acara/kelas-acara/create?acara_id={{ $acara->id }}" class="btn btn-primary mb-3">Tambah Kelas</a>
                        <div class="table-responsive col-lg-12">
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Kode Instruktur</th>
                                        <th scope="col">Kuota</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_kelas as $kelas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kelas->nama }}</td>
                                            {{-- <td>{{ $kelas->instrukturAcara->dosen->kode_dosen }}</td> --}}
                                            <td>{{ $kelas->instruktur->kode_dosen }}</td>
                                            <td>{{ $kelas->kuota }}</td>
                                            <td>
                                                <a href="/dashboard/acara/kelas-acara/{{ $kelas->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="/dashboard/acara/kelas-acara/{{ $kelas->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure?')">Hapus</button>
                                                </form>
                                                {{-- <a href="/dashboard/acara/jadwal-acara?acara_id={{ $acara->id }}&kelas_id={{ $kelas->id }}" class="btn btn-info btn-sm">Kelola Jadwal</a> --}}
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
    </div>
    {{-- </div> --}}
@endsection