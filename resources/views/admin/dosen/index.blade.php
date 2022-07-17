@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Dosen</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive col-lg-12">
        <a href="/dashboard/dosen/create" class="btn btn-primary mb-3">Tambah Data Dosen</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Dosen</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_dosen as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->kode_dosen }}</td>
                        <td>{{ $dosen->user->nama }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nip }}</td>
                        <td>
                            <a href="/dashboard/dosen/{{ $dosen->id }}" class="badge bg-info" title="Detail"><span data-feather="eye"></span></a>
                            <a href="/dashboard/dosen/{{ $dosen->id }}/edit" class="badge bg-warning" title="edit"><span data-feather="edit"></span></a>
                            @if ($dosen->deleted_at)
                                <form action="/dashboard/dosen/restore/" method="post" class="d-inline">
                                    {{-- @method('restore') --}}
                                    <input type="hidden" name="id" value="{{ $dosen->id }}">
                                    @csrf
                                    <button type="submit" class="badge bg-success border-0" onclick="return confirm('Are Your Sure?')" title="Pulihkan/Aktifkan"><span data-feather="check-circle"></span></button>
                                </form>
                            @else
                                <form action="/dashboard/dosen/{{ $dosen->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are Your Sure?')" title="Hapus/Nonaktifkan"><span data-feather="x-circle"></span></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection