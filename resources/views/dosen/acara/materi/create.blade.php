@extends('dosen.layouts.main')
@section('container')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/koordinator/acara">Acara</a></li>
                    <li class="breadcrumb-item"><a href="/dosen/materi?acara_id={{ $acara->id }}">Materi</a></li>
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
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Pelatihan & Sertifikasi: "{{ $acara->nama }}" - Tambah Materi</h4>
                    <form action="/dosen/materi" method="post">
                        @csrf
                        <input type="hidden" name="acara_id" value="{{ $acara->id }}">
                        <div class="form-group">
                            <label for="materi">Materi</label>
                            <input type="text" class="form-control @error('materi') is-invalid @enderror" name="materi" id="materi" required autofocus value="{{ old('materi') }}">
                            @error('materi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
