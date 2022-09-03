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

                            <h6 class="h5 mb-0 mt-4">Selamat Datang!</h6>
                            <p class="text-muted mt-1 mb-4">Selamat Datang di Halaman Sertifikasi Telkom</p>
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('loginError') }}
                                </div>
                            @endif
                            <form action="/login" method="post" class="authentication-form needs-validation">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="mail"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" autofocus>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mt-4">
                                    <label class="form-control-label">Password</label>
                                    {{-- <a href="pages-recoverpw.html" class="float-right text-muted text-unline-dashed ml-1">Forgot your password?</a> --}}
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

                                <div class="form-group mb-4 row">
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="role" class="custom-control-input" id="role-admin" value="admin">
                                            <label class="custom-control-label" for="role-admin">Admin</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="role" class="custom-control-input" id="role-mahsiswa" value="mahsiswa">
                                            <label class="custom-control-label" for="role-mahsiswa">Mahasiswa</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-4 row">
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="role" class="custom-control-input" id="role-instruktur" value="instruktur">
                                            <label class="custom-control-label" for="role-instruktur">Instruktur</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="role" class="custom-control-input" id="role-koordinator" value="koordinator">
                                            <label class="custom-control-label" for="role-koordinator">Koordinator</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="role" class="custom-control-input" id="role-kaprodi" value="kaprodi">
                                            <label class="custom-control-label" for="role-kaprodi">Kaprodi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In
                                    </button>
                                </div>
                            </form>
                            {{-- <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">Or</span></div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-white"><i class='uil uil-google icon-google mr-2'></i>With Google</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-white"><i class='uil uil-facebook mr-2 icon-fb'></i>With Facebook</a>
                                </div>
                            </div> --}}
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
                    <p class="text-muted">Belum Punya Akun? <a href="/registrasi" class="text-primary font-weight-bold ml-1">Daftar</a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection