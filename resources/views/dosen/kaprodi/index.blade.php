@extends('dosen.layouts.main')
@section('container')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Kaprodi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $kategori_acara }}</li>
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
                    <h4 class="header-title mt-0 mb-1">Data Pelatihan & Sertifikasi</h4>
                    <div class="table-responsive col-lg-12">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pelatihan / Sertifikasi</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Penyelenggara</th>
                                    <th scope="col">Koordinator</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status Kegiatan</th>
                                    <th scope="col">Kuota</th>
                                    <th scope="col">Jumlah Peserta</th>
                                    <th scope="col">Kategori</th>
                                    {{-- <th scope="col">Status Acara</th> --}}
                                    {{-- <th scope="col">Status Validasi</th> --}}
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_acara as $acara)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $acara->nama }}</td>
                                        <td>{{ $acara->periode }}</td>
                                        <td>{{ $acara->nama_penyelenggara }}</td>
                                        <td>{{ $acara->koordinator->user->nama }}</td>
                                        <td>{{ $acara->lokasi }}</td>
                                        <td>
                                            @if (isset($acara->statusAcara->status))
                                                {{ $acara->statusAcara->status }}
                                            @endif
                                        </td>
                                        <td>{{ $acara->kuota }}</td>
                                        <td>{{ $acara->jumlah_peserta }}</td>
                                        <td>
                                            @if ($acara->kategoriAcara->id == 1)
                                                <span class="badge badge-soft-info py-1">{{ $acara->kategoriAcara->kategori }}</span>
                                            @else
                                                <span class="badge badge-soft-primary py-1">{{ $acara->kategoriAcara->kategori }}</span>
                                            @endif
                                                
                                        </td>
                                        {{-- <td>{{ $acara->statusAcara->status }}</td>
                                        <td>
                                            @if ($acara->is_valid == 1)
                                                <span class="badge badge-soft-success py-1">Valid</span>
                                            @else
                                                <span class="badge badge-soft-danger py-1">Tidak Valid</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            <a href="/koordinator/acara/{{ $acara->id }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="/koordinator/acara/peserta/{{ $acara->id }}" class="btn btn-info btn-sm">List Peserta</a>
                                        </td> --}}
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