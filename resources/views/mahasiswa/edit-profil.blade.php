@extends('mahasiswa.layouts.main')

@section('container')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
                <li class="breadcrumb-item"><a href="/mahasiswa/profil">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Edit</h4>
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
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="/profil/edit/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data" class="needs-validation">
                    <h4>Data Profil</h4>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', auth()->user()->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', auth()->user()->email) }}">
                        <p>Format email: example@student.telkomuniversity.ac.id</p>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @selected(old('jenis_kelamin', auth()->user()->jenis_kelamin) == "Laki-laki")>Laki-laki</option>
                            <option value="Perempuan" @selected(old('jenis_kelamin', auth()->user()->jenis_kelamin) == "Perempuan")>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" required value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}">
                        @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}">
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" required value="{{ old('nomor_telepon', auth()->user()->nomor_telepon) }}">
                        @error('nomor_telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ old('alamat', auth()->user()->alamat) }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                        <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam" @selected(old('agama', auth()->user()->agama) == "Islam")>Islam</option>
                            <option value="Kristen Protestan" @selected(old('agama', auth()->user()->agama) == "Kristen Protestan")>Kristen Protestan</option>
                            <option value="Kristen Katolik" @selected(old('agama', auth()->user()->agama) == "Kristen Katolik")>Kristen Katolik</option>
                            <option value="Budha" @selected(old('agama', auth()->user()->agama) == "Budha")>Budha</option>
                            <option value="Hindu" @selected(old('agama', auth()->user()->agama) == "Hindu")>Hindu</option>
                            <option value="Konghucu" @selected(old('agama', auth()->user()->agama) == "Konghucu")>Konghucu</option>
                        </select>
                        @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="oldFoto" value="{{ auth()->user()->foto }}">
                        <label for="foto" class="form-label">Foto</label>
                        @if (auth()->user()->foto)
                            <img class="foto-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.auth()->user()->foto) }}">
                        @else
                            <img class="foto-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewFoto()">
                        <p class="text-left">Format file: jpg, jpeg, png</p>
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="tentang" class="form-label">Tentang Saya</label>
                        <textarea class="form-control @error('tentang') is-invalid @enderror" id="tentang" name="tentang" required>{{ old('tentang', auth()->user()->tentang) }}</textarea>
                        @error('tentang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    <p><span class="text-danger">*</span>) Tidak boleh kosong</p>
                    <button class="btn btn-primary" type="submit">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form action="/mahasiswa/edit/{{ $mahasiswa->id }}" method="post" enctype="multipart/form-data" class="needs-validation">
                    <h4>Data Mahasiswa</h4>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required value="{{ old('nim', $mahasiswa->nim) }}">
                        @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kelas_id" class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" required>
                            <option value="" selected disabled>Pilih Kelas</option>
                            @foreach ($list_kelas as $kelas)
                                @if (old('kelas_id', $mahasiswa->kelas_id) == $kelas->id)
                                    <option value="{{ $kelas->id }}" selected>{{ $kelas->kelas }}</option>    
                                @else
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="oldKtm" value="{{ $mahasiswa->scan_ktm }}">
                        <label for="scan_ktm" class="form-label">Scan KTM</label>
                        @if ($mahasiswa->scan_ktm)
                            <img class="ktm-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.$mahasiswa->scan_ktm) }}">
                        @else
                            <img class="ktm-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('scan_ktm') is-invalid @enderror" type="file" id="scan_ktm" name="scan_ktm" onchange="previewKTM()">
                        <p class="text-left">Format file: jpg, jpeg, png</p>
                        @error('scan_ktm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="oldKsm" value="{{ $mahasiswa->ksm }}">
                        <label for="ksm" class="form-label">Kartu Studi Mahasiswa</label>
                        @if ($mahasiswa->ksm)
                            <div class="row">
                                <div class="p-2 border rounded mb-2">
                                    <div class="media">
                                        <div class="avatar-sm font-weight-bold mr-3">
                                            <span class="avatar-title rounded bg-soft-primary text-primary">
                                                <i class="uil-file-plus-alt font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ asset('storage/'.$mahasiswa->ksm) }}" target="_blank" class="d-inline-block mt-2">{{ "KSM_".$mahasiswa->nim }}.pdf</a>
                                        </div>
                                        <div class="float-right mt-1">
                                            <a href="{{ asset('storage/'.$mahasiswa->ksm) }}" target="_blank" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <span class="p-2 text-danger">Anda Belum menginput KSM</span>
                        </div>
                        @endif
                        <input class="form-control @error('ksm') is-invalid @enderror" type="file" id="ksm" name="ksm">
                        <p class="text-left">Format file: pdf</p>
                        @error('ksm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="oldTranskip_nilai" value="{{ $mahasiswa->transkip_nilai }}">
                        <label for="transkip_nilai" class="form-label">Transkip Nilai</label>
                        @if ($mahasiswa->transkip_nilai)
                            <div class="row">
                                <div class="p-2 border rounded mb-2">
                                    <div class="media">
                                        <div class="avatar-sm font-weight-bold mr-3">
                                            <span class="avatar-title rounded bg-soft-primary text-primary">
                                                <i class="uil-file-plus-alt font-size-18"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ asset('storage/'.$mahasiswa->transkip_nilai) }}" target="_blank" class="d-inline-block mt-2">{{ "TN_".$mahasiswa->nim }}.pdf</a>
                                        </div>
                                        <div class="float-right mt-1">
                                            <a href="{{ asset('storage/'.$mahasiswa->transkip_nilai) }}" target="_blank" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <span class="p-2 text-danger">Anda Belum menginput Transkip Nilai</span>
                        </div>
                        @endif
                        <input class="form-control @error('transkip_nilai') is-invalid @enderror" type="file" id="transkip_nilai" name="transkip_nilai">
                        <p class="text-left">Format file: pdf</p>
                        @error('transkip_nilai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <p><span class="text-danger">*</span>) Tidak boleh kosong</p>
                    <button class="btn btn-primary" type="submit">Simpan</button>

                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/update-password/{{ auth()->user()->id }}" method="post" class="needs-validation">
                    <h4>Ubah Kata Sandi</h4>
                    @method('put')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="current_password" class="form-label">Kata Sandi Lama</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Kata Sandi Baru</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <p><span class="text-danger">*</span>) Tidak boleh kosong</p>
                    <button class="btn btn-primary" type="submit">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewFoto() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.foto-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewKTM() {
        const scan_ktm = document.querySelector('#scan_ktm');
        const imgPreview = document.querySelector('.ktm-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(scan_ktm.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection