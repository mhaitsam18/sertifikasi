@extends('dosen.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dosen">Dosen</a></li>
                    <li class="breadcrumb-item"><a href="/koordinator/acara">Acara</a></li>
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
                                {{-- <th scope="col">Jumlah Tagihan</th>
                                <th scope="col">Sisa Tagihan</th> --}}
                                <th scope="col">Status Tagihan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($list_peserta->count())
                                @foreach ($list_peserta as $peserta)
                                    <tr class="{{ ($peserta->sisa_tagihan <= 0) ? 'table-success' : 'table-danger'}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <form action="">
                                                <div class="form-group">
                                                    <select name="kelas_acara_id" id="kelas_acara_id" onchange="" class="form-control kelas_acara_id" data-id="{{ $peserta->id }}">
                                                        <option value="" selected disabled>Pilih Kelas</option>
                                                        @foreach ($list_kelas as $kelas)
                                                            @if ($kelas->id == $peserta->kelas_acara_id)
                                                                <option value="{{ $kelas->id }}" selected>Kelas: {{ $kelas->nama }}</option>
                                                            @else
                                                                <option value="{{ $kelas->id }}">Kelas: {{ $kelas->nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ $peserta->mahasiswa->nim }}</td>
                                        <td>{{ $peserta->mahasiswa->user->nama }}</td>
                                        <td>{{ $peserta->acara->nama }}</td>
                                        {{-- <td>Rp.{{ number_format($peserta->tagihan,2,',','.') }}</td>
                                        <td>Rp.{{ number_format($peserta->sisa_tagihan,2,',','.') }}</td> --}}
                                        <td>
                                            @if ($peserta->sisa_tagihan > 0)
                                                Belum Lunas
                                            @else
                                                Lunas
                                            @endif
                                        </td>
                                        <td>
                                            {{ $peserta->statusPeserta->status }}
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
                url: "/koordinator/acara/ubahKelasPeserta",
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