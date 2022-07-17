@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Dosen</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <form action="/dashboard/userDosen/{{ $dosen->user->id }}" method="post" enctype="multipart/form-data">
                        <h6 class="h6">Data Profil</h6>
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $dosen->user->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $dosen->user->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dosen->user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="" selected disabled>Pilih Gender</option>
                                <option value="Laki-laki" @selected(old('jenis_kelamin', $dosen->user->jenis_kelamin) == 'Laki-laki')>Laki-laki</option>
                                <option value="Perempuan" @selected(old('jenis_kelamin', $dosen->user->jenis_kelamin) == 'Perempuan')>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for="tempat_lahir" class="form-label">Tempat</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" required value="{{ old('tempat_lahir', $dosen->user->tempat_lahir) }}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $dosen->user->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" required value="{{ old('nomor_telepon', $dosen->user->nomor_telepon) }}">
                            @error('nomor_telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ old('alamat', $dosen->user->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select @error('agama') is-invalid @enderror" id="agama" name="agama" required>
                                <option value="" selected disabled>Pilih Agama</option>
                                <option value="Islam" @selected(old('agama', $dosen->user->agama) == 'Islam')>Islam</option>
                                <option value="Kristen Protestan" @selected(old('agama', $dosen->user->agama) == 'Kristen Protestan')>Kristen Protestan</option>
                                <option value="Kristen Katolik" @selected(old('agama', $dosen->user->agama) == 'Kristen Katolik')>Kristen Katolik</option>
                                <option value="Budha" @selected(old('agama', $dosen->user->agama) == 'Budha')>Budha</option>
                                <option value="Hindu" @selected(old('agama', $dosen->user->agama) == 'Hindu')>Hindu</option>
                                <option value="Konghucu" @selected(old('agama', $dosen->user->agama) == 'Konghucu')>Konghucu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="oldFoto" value="{{ $dosen->user->foto }}">
                            <label for="foto" class="form-label">foto Dosen</label>
                            @if ($dosen->user->foto)
                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.$dosen->user->foto) }}">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewFoto()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="tentang" class="form-label">Tentang Dosen</label>
                            @error('tentang')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input id="tentang" type="hidden" name="tentang" value="{{ old('tentang', $dosen->user->tentang) }}">
                            <trix-editor input="tentang"></trix-editor>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <form action="/dashboard/dosen/{{ $dosen->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" value="{{ $dosen->id }}" name="id">
                        <h6 class="h6">Data Dosen</h6>
                        <div class="mb-3">
                            <label for="kode_dosen" class="form-label">Kode Dosen (XXX)</label>
                            <input type="text" class="form-control @error('kode_dosen') is-invalid @enderror" id="kode_dosen" name="kode_dosen" required value="{{ old('kode_dosen', $dosen->kode_dosen) }}">
                            @error('kode_dosen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nidn" class="form-label">NIDN</label>
                            <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" required value="{{ old('nidn', $dosen->nidn) }}">
                            @error('nidn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" required value="{{ old('nip', $dosen->nip) }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="is_kaprodi" name="is_kaprodi" @checked(old('is_kaprodi', $dosen->is_kaprodi))>
                                <label class="form-check-label" for="is_kaprodi">
                                  Kaprodi?
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="is_koordinator" name="is_koordinator" @checked(old('is_koordinator', $dosen->is_koordinator))>
                                <label class="form-check-label" for="is_koordinator">
                                  Koordinator?
                                </label>
                            </div>
            
                        </div>
            
            
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
    
        </div>
    </div>

    <script>
        function previewFoto() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection