@extends('dosen.layouts.main')
@section('container')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/koordinator/acara">Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Create</h4>
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
                    <h4 class="header-title mt-0 mb-1">Tambah Data Pelatihan & Sertifikasi</h4>
                    <form action="/koordinator/acara" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Acara<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" required autofocus value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori_acara_id">Kategori Acara<span class="text-danger">*</span></label>
                            <select class="form-control @error('kategori_acara_id') is-invalid @enderror" name="kategori_acara_id" id="kategori_acara_id" required value="{{ old('kategori_acara_id') }}">
                                <option value="" selected disabled>Pilih Kategori Acara</option>
                                @foreach ($list_kategori_acara as $kategori)
                                    @if ($kategori->id == old('kategori_acara_id'))
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_acara_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi<span class="text-danger">*</span></label>
                            @error('deskripsi')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                        <div class="form-group">
                            <h5>Pendaftaran Buka</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="deskripsi">Tanggal<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_pendaftaran_buka') is-invalid @enderror" name="tanggal_pendaftaran_buka" id="tanggal_pendaftaran_buka" value="{{ old('tanggal_pendaftaran_buka') }}">
                                    @error('tanggal_pendaftaran_buka')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="deskripsi">Waktu<span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('waktu_pendaftaran_buka') is-invalid @enderror" name="waktu_pendaftaran_buka" id="waktu_pendaftaran_buka" value="{{ old('waktu_pendaftaran_buka') }}">
                                    @error('waktu_pendaftaran_buka')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Pendaftaran Tutup</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="deskripsi">Tanggal<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_pendaftaran_tutup') is-invalid @enderror" name="tanggal_pendaftaran_tutup" id="tanggal_pendaftaran_tutup" value="{{ old('tanggal_pendaftaran_tutup') }}">
                                    @error('tanggal_pendaftaran_tutup')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="deskripsi">Waktu<span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('waktu_pendaftaran_tutup') is-invalid @enderror" name="waktu_pendaftaran_tutup" id="waktu_pendaftaran_tutup" value="{{ old('waktu_pendaftaran_tutup') }}">
                                    @error('waktu_pendaftaran_tutup')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Pelaksanaan Buka</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="deskripsi">Tanggal<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_pelaksanaan_buka') is-invalid @enderror" name="tanggal_pelaksanaan_buka" id="tanggal_pelaksanaan_buka" value="{{ old('tanggal_pelaksanaan_buka') }}">
                                    @error('tanggal_pelaksanaan_buka')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="deskripsi">Waktu<span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('waktu_pelaksanaan_buka') is-invalid @enderror" name="waktu_pelaksanaan_buka" id="waktu_pelaksanaan_buka" value="{{ old('waktu_pelaksanaan_buka') }}">
                                    @error('waktu_pelaksanaan_buka')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Pelaksanaan Tutup</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="deskripsi">Tanggal<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_pelaksanaan_tutup') is-invalid @enderror" name="tanggal_pelaksanaan_tutup" id="tanggal_pelaksanaan_tutup" value="{{ old('tanggal_pelaksanaan_tutup') }}">
                                    @error('tanggal_pelaksanaan_tutup')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="deskripsi">Waktu<span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('waktu_pelaksanaan_tutup') is-invalid @enderror" name="waktu_pelaksanaan_tutup" id="waktu_pelaksanaan_tutup" value="{{ old('waktu_pelaksanaan_tutup') }}">
                                    @error('waktu_pelaksanaan_tutup')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi Acara<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" required value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya Acara<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" name="biaya" id="rupiah" required value="{{ old('biaya') }}">
                            @error('biaya')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kuota">Kuota<span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('kuota') is-invalid @enderror" name="kuota" id="kuota" value="{{ old('kuota') }}" min="0">
                            @error('kuota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Poster Pelatihan/Sertifikasi<span class="text-danger">*</span></label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" onchange="previewThumbnail()">
                            <small>Format file: jpg, jpeg, png</small>
                            @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <p class="text-muted">
                            <span class="text-danger">*</span>) Wajib diisi
                        </p>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <script>
        function previewThumbnail() {
            const thumbnail = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(thumbnail.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
