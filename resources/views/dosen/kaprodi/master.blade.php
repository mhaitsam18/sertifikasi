@extends('dosen.layouts.main')
@section('container')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Kaprodi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Histori</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Pelatihan & Sertifikasi</h4>
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
                    <h4 class="header-title mt-0 mb-1">Master Pelatihan & Sertifikasi</h4>
                    <div class="table-responsive col-lg-12">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pelatihan / Sertifikasi</th>
                                    <th scope="col">Koordinator</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Kuota</th>
                                    <th scope="col">Kategori Acara</th>
                                    <th scope="col">Status Acara</th>
                                    <th scope="col">Status Validasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_acara as $acara)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $acara->nama }}</td>
                                        <td>{{ $acara->koordinator->user->nama }}</td>
                                        <td>{{ $acara->lokasi }}</td>
                                        <td>Rp. {{ number_format($acara->biaya,2,',','.') }}</td>
                                        <td>{{ $acara->kuota }}</td>
                                        <td>
                                            @if ($acara->kategoriAcara->id == 1)
                                                <span class="badge badge-soft-info py-1">{{ $acara->kategoriAcara->kategori }}</span>
                                            @else
                                                <span class="badge badge-soft-primary py-1">{{ $acara->kategoriAcara->kategori }}</span>
                                                
                                                @endif
                                                
                                            </td>
                                            <td>{{ $acara->statusAcara->status }}</td>
                                            <td>
                                            @if ($acara->is_valid == 1)
                                                <span class="badge badge-soft-success py-1">Valid</span>
                                            @else
                                                <span class="badge badge-soft-danger py-1">Tidak Valid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/koordinator/acara/{{ $acara->id }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="/koordinator/acara/{{ $acara->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/koordinator/acara/peserta/{{ $acara->id }}" class="btn btn-info btn-sm">List Peserta</a>
                                            <a href="/koordinator/acara/instruktur/{{ $acara->id }}" class="btn btn-success btn-sm">Data Instruktur</a>
                                            <a href="/koordinator/acara/kelas-acara?acara_id={{ $acara->id }}" class="btn btn-dark btn-sm">Data Kelas</a>
                                            <a href="/koordinator/acara/materi?acara_id={{ $acara->id }}" class="btn btn-secondary btn-sm">Data Materi</a>
                                            <a href="/koordinator/acara/jadwal-acara?acara_id={{ $acara->id }}" class="btn btn-danger btn-sm">Kelola Jadwal</a>
                                            <a href="/koordinator/acara/fasilitas?acara_id={{ $acara->id }}" class="btn btn-soft-primary btn-sm">Kelola Fasilitas</a>
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