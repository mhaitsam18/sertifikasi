@extends('auth.layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-6 p-5">
                            <div class="mx-auto mb-5">
                                <a href="index.html">
                                    <img src="/images/logo.png" alt="" height="24" />
                                    <h3 class="d-inline align-middle ml-1 text-logo">Sertifikasi</h3>
                                </a>
                            </div>

                            <h6 class="h5 mb-0 mt-4">Buat lah Akunmu Sendiri!</h6>
                            <p class="text-muted mt-1 mb-4">Bergabunglah bersama kami di Sertifikasi Telkom</p>

                            <form action="/registrasi" method="post" enctype="multipart/form-data" class="authentication-form needs-validation">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Email <span class="text-danger">*</span>
                                    </label>
                                    @if (old('email'))
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="mail"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" id="email"  name="email" autofocus value="{{ old('email') }}">
                                    </div>                                            
                                    @else
                                    <div class="input-group input-group-merge email-text">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="mail"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control email-input" id="email" autofocus value="{{ old('email') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                @student.telkomuniversity.ac.id
                                            </span>
                                        </div>
                                        <input type="hidden" name="email" id="email-hidden" value="{{ old('email') }}">
                                    </div>                                        
                                    @endif
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Nama Lengkap  <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="edit-3"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" >
                                    </div>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="user-x"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" @selected(old('jenis_kelamin') == "Laki-laki")>Laki-laki</option>
                                            <option value="Perempuan" @selected(old('jenis_kelamin') == "Perempuan")>Perempuan</option>
                                        </select>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">
                                        Tempat Lahir <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="map-pin"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" >
                                    </div>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Tanggal Lahir <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="calendar"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" >
                                    </div>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">
                                        Nomor Telepon <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                +62
                                                {{-- <i class="icon-dual" data-feather="phone"></i> --}}
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" >
                                    </div>
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Alamat <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="map-pin"></i>
                                            </span>
                                        </div>
                                        <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                                    </div>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">
                                        Agama <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="book"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" id="agama" name="agama" required>
                                            <option value="" selected disabled>Pilih Agama</option>
                                            <option value="Islam" @selected(old('agama') == "Islam")>Islam</option>
                                            <option value="Kristen Protestan" @selected(old('agama') == "Kristen Protestan")>Kristen Protestan</option>
                                            <option value="Kristen Katolik" @selected(old('agama') == "Kristen Katolik")>Kristen Katolik</option>
                                            <option value="Budha" @selected(old('agama') == "Budha")>Budha</option>
                                            <option value="Hindu" @selected(old('agama') == "Hindu")>Hindu</option>
                                            <option value="Konghucu" @selected(old('agama') == "Konghucu")>Konghucu</option>
                                        </select>
                                    </div>
                                    @error('agama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">
                                        Foto <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="camera"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" >
                                    </div>
                                    <p class="text-left">Format file: jpg, jpeg, png</p>
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-control-label">Tentang Saya</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="file-text"></i>
                                            </span>
                                        </div>
                                        <textarea class="form-control" id="tentang" name="tentang">{{ old('tentang') }}</textarea>
                                    </div>
                                    @error('tentang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="form-group mt-4">
                                    <label class="form-control-label">
                                        Kata Sandi <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label class="form-control-label">
                                        Konfirmasi Kata Sandi <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <h4>Data Mahasiswa</h4>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        NIM <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="edit-3"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" >
                                    </div>
                                    @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Kelas <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="monitor"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" id="kelas_id" name="kelas_id" required>
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            @foreach ($list_kelas as $kelas)
                                                <option value="{{ $kelas->id }}" @selected(old('kelas_id') == "{{ $kelas->id }}")>{{ $kelas->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('kelas_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">
                                        KTM <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="file"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" id="scan_ktm" name="scan_ktm" value="{{ old('scan_ktm') }}" >
                                    </div>
                                    <p class="text-left">Format file: jpg, jpeg, png</p>
                                    @error('scan_ktm')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <p><span class="text-danger">*</span>) Wajib diisi</p>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Daftar </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 d-none d-md-inline-block">
                            <div class="auth-page-sidebar">
                                <div class="overlay"></div>
                                <div class="auth-user-testimonial">
                                    <p class="font-size-24 font-weight-bold text-white mb-1">Selamat Datang di Website Sertifikasi Telkom University!</p>
                                    <p class="lead">"Melayani dengan sepenuh Hati!"</p>
                                    {{-- <p>- Admin User</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Sudah Punya Akun? <a href="/login" class="text-primary font-weight-bold ml-1">Login</a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('script')
<script>
    $(".email-input").on('blur', function() {
        const email = $(this).val();
        $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: 'registrasi/email-blur',
            type: "post",
            data: {
                'email': email
            },
            success: function(data) {
                $(".email-text").html(data);
            }
        });

    });
</script>
    
@endsection