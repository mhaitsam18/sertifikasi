@extends('dosen.layouts.main')
@section('container')
<?php 
use App\Models\Peserta;
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/dosen/acara">Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Peserta</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Koordinator | Daftar Nilai & Sertifikat Peserta : {{ $acara->nama }}</h4>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-body">
                    <a href="javascript:window.history.go(-1);" class="btn btn-primary my-1">Kembali</a>
                    {{-- <table class="table table-hover" id="dataTable"> --}}
                    <table class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Status Peserta</th>
                                <th scope="col">Nilai Akhir</th>
                                <th scope="col">Sertifikat</th>
                                <th scope="col">Upload Sertifikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($list_nilai->count())
                                @foreach ($list_nilai as $nilai)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $nilai->peserta->mahasiswa->nim }}</td>
                                        <td>{{ $nilai->peserta->mahasiswa->user->nama }}</td>
                                        <td>
                                            <form action="">
                                                <div class="form-group">
                                                    <select name="status_peserta_id" id="status_peserta_id" onchange="" class="form-control status_peserta_id" data-id="{{ $nilai->peserta->id }}">
                                                        <option value="" selected disabled>Pilih Status</option>
                                                        @foreach ($list_status as $status)
                                                            @if ($status->id == $nilai->peserta->status_peserta_id)
                                                                <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                                                            @else
                                                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                                {{ $nilai->nilai }}
                                        </td>
                                        <td>
                                            @if (isset($nilai->sertifikat))
                                                <a href="{{ asset("storage/".$nilai->sertifikat) }}" class="btn btn-info btn-sm">Lihat Sertifikat</a>
                                            @endif
                                                <a href="/koordinator/sertifikat?peserta_id={{ $nilai->peserta_id }}" class="btn btn-link btn-sm">Sertifikat Lainnya</a>
                                        </td>
                                        <td>
                                            <form class="form-inline" action="/instruktur/nilai/{{ $nilai->id }}" method="post" enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" name="peserta_id" value="{{ $nilai->peserta_id }}">
                                                <input type="hidden" name="nilai" value="{{ $nilai->nilai }}">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="sertifikat" id="sertifikat{{ $nilai->id }}" aria-describedby="inputGroupFileSertifikat{{ $nilai->id }}">
                                                        <label class="custom-file-label" for="sertifikat{{ $nilai->id }}">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileSertifikat{{ $nilai->id }}">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="7">Data Tidak ditemukan</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                
    </div>
    <!-- end row -->
    {{-- <div class="row mb-3 mt-2">
        <div class="col-12">
            <div class="text-center">
                <a href="javascript:void(0);" class="btn btn-white">
                    <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                    Load more
                </a>
            </div>
        </div> <!-- end col-->
    </div> --}}
    <!-- end row -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="/js/datatables-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        });

        $('.status_peserta_id').on('change', function() {
            const peserta_id = $(this).data('id');
            const status_peserta_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/acara/ubahStatusPeserta",
                type: 'post',
                data: {
                    peserta_id: peserta_id,
                    status_peserta_id: status_peserta_id
                },
                success: function() {
                    document.location.href = "/koordinator/nilai?acara_id=<?= $acara->id ?>";
                }
            });
            
        });
    </script>
@endsection