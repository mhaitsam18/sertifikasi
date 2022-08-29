@extends('dosen.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Kaprodi</a></li>
                    <li class="breadcrumb-item"><a href="/kaprodi/histori">Histori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Peserta</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Data Peserta</h4>
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
                    <h4 class="header-title mt-0 mb-1">Data Peserta Acara Pelatihan/Sertifikasi "{{ $acara->nama }}"</h4>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Acara yang diikuti</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Status</th>
                                <th scope="col">Sertifikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($list_peserta->count())
                                @foreach ($list_peserta as $peserta)
                                    <tr class="{{ $peserta->status_peserta_id == 6 ? 'table-success' : ($peserta->status_peserta_id == 7 ? 'table-danger' : '') }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $peserta->kelasAcara->nama }}
                                        </td>
                                        <td>{{ $peserta->mahasiswa->nim }}</td>
                                        <td>{{ $peserta->mahasiswa->user->nama }}</td>
                                        <td>{{ $peserta->acara->nama }}</td>
                                        <td>
                                            @isset($peserta->nilai->nilai)
                                                {{ $peserta->nilai->nilai }}
                                            @else
                                                0
                                            @endisset
                                            
                                        </td>
                                        <td>
                                            {{ $peserta->statusPeserta->status }}
                                        </td>
                                        <td>
                                            @isset($peserta->nilai->sertifikat)
                                                <a href="{{ asset("storage/".$peserta->nilai->sertifikat) }}" class="btn btn-info btn-sm">Lihat Sertifikat</a>
                                            @endisset
                                        </td>
                                        
                                    </tr>
                                @endforeach                                
                            @else
                                <tr>
                                    <td colspan="8">Data tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="/jquery/jquery.min.js"></script>
    <script src="/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script type="text/javascript">
        $('.kelas_acara_id').on('change', function() {
            const peserta_id = $(this).data('id');
            const kelas_acara_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/acara/ubahKelasPeserta",
                type: 'post',
                data: {
                    peserta_id: peserta_id,
                    kelas_acara_id: kelas_acara_id
                },
                success: function() {
                    document.location.href = "/koordinator/acara/peserta/<?= $acara->id ?>";
                }
            });
            
        });
        
    </script>
@endsection