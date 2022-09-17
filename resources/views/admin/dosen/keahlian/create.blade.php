@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
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
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Keahlian: "{{ $dosen->user->nama }}"</h4>
                    <form action="/dashboard/dosen/keahlian" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="dosen_id" value="{{ $dosen->id }}">
                        <div class="form-group">
                            <label for="keahlian">Nama Keahlian</label>
                            <input type="text" class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" id="keahlian" required autofocus value="{{ old('keahlian') }}">
                            @error('keahlian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <img class="sertifikat-preview img-fluid mt-3 col-sm-5">
                            </div>
                            <label for="sertifikat">Upload Sertifikat</label>
                            <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" name="sertifikat" id="sertifikat" required value="{{ old('sertifikat') }}" onchange="previewSertifikat()">
                            @error('sertifikat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewSertifikat() {
        const sertifikat = document.querySelector('#sertifikat');
        const imgPreview = document.querySelector('.sertifikat-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(sertifikat.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection
