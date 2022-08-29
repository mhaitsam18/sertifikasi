@extends('dosen.layouts.main')
@section('container')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/koordinator/acara/{{ $acara->id }}">Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Fasilitas</h4>
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
                    <h4 class="header-title mt-0 mb-1">Data fasilitas "{{ $acara->nama }}"</h4>
                    {{-- <div class="table-responsive col-lg-12"> --}}
                        <a href="/koordinator/acara/fasilitas/create?acara_id={{ $acara->id }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama fasilitas</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_fasilitas as $fasilitas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fasilitas->fasilitas }}</td>
                                        <td>{{ $fasilitas->keterangan }}</td>
                                        <td>
                                            <a href="/koordinator/acara/fasilitas/{{ $fasilitas->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="/koordinator/acara/fasilitas/{{ $fasilitas->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure?')">Hapus</button>
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
    {{-- </div> --}}
@endsection