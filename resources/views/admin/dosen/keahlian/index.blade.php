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
        <a href="/dashboard/dosen/keahlian/create?dosen_id={{ $dosen->id }}" class="btn btn-primary mb-3">Tambah Data Keahlian</a>
        <h3>Nama Dosen: {{ $dosen->user->nama }}</h3>
        <h3>NIDN: {{ $dosen->nidn }}</h3>
        <h3>NIP: {{ $dosen->nip }}</h3>
        <table class="table table-striped table-sm" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Keahlian</th>
                    <th scope="col">Sertifikat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_keahlian as $keahlian)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $keahlian->keahlian }}</td>
                        <td><img src="{{ asset('storage/'.$keahlian->sertifikat)  }}" alt="" class="img-thumbnail" style="width: 250px;"></td>
                        <td>
                            <a href="/dashboard/dosen/keahlian/{{ $keahlian->id }}/edit" class="badge bg-warning" title="Edit"><span data-feather="edit"></span></a>
                            <form action="/dashboard/dosen/keahlian/{{ $keahlian->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are Your Sure?')" title="Hapus/Nonaktifkan"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection