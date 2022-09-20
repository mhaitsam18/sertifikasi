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
                    {{-- <li class="breadcrumb-item"><a href="/koordinator/acara/{{ $acara->id }}">Acara</a></li> --}}
                    @if ($kelas)
                        <li class="breadcrumb-item"><a href="/koordinator/acara/kelas-acara?acara_id={{ $acara->id }}">Kelas</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Jadwal</h4>
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
                    <h4 class="header-title mt-0 mb-1">Jadwal Acara Pelatihan/Sertifikasi "{{ $acara->nama }}"</h4>
                    @if ($kelas)
                        <h4 class="header-title mt-0 mb-1">Kelas: {{ $kelas->nama }}</h4>
                    @endif
                    <a href="/koordinator/acara/jadwal-acara/create?acara_id={{ $acara->id }}{{ ($kelas) ? "&kelas_id=".$kelas->id : '' }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Status Jadwal</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Kode Dosen Instruktur</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Link</th>
                                <th scope="col">Materi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ujian</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_jadwal as $jadwal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <form action="">
                                            <div class="form-group">
                                                <select name="status_jadwal" id="status_jadwal" onchange="" class="form-control status_jadwal" data-id="{{ $jadwal->jadwal_id }}">
                                                    @foreach ($list_status as $status)
                                                        @if ($status->id == $jadwal->status_jadwal_id)
                                                            <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                                                        @else
                                                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                        {{-- {{ $jadwal->status }} --}}
                                    </td>
                                    <td>{{ $jadwal->nama_kelas }}</td>
                                    <td>{{ $jadwal->kode_dosen }}</td>
                                    <td>{{ $jadwal->ruangan }}</td>
                                    <td>{{ $jadwal->link }}</td>
                                    <td>{{ $jadwal->materi }}</td>
                                    <td>{{ Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td>{{ Carbon::parse($jadwal->waktu_dimulai)->translatedFormat('d F Y') }}</td>
                                    <td>
                                        @if ($jadwal->is_ujian =  true)
                                            Ujian
                                        @else
                                            Bukan Ujian
                                        @endif
                                    </td>
                                    <td>{{ $jadwal->keterangan }}</td>
                                    <td>
                                        <a href="/koordinator/acara/jadwal-acara/{{ $jadwal->jadwal_id }}/edit?acara_id={{ $acara->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/koordinator/acara/jadwal-acara/{{ $jadwal->jadwal_id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are Your Sure?')">Hapus</button>
                                        </form>
                                        @if($jadwal->beritaAcara)
                                        <a href="/koordinator/acara/jadwal-acara/bap/{{ $jadwal->beritaAcara->id }}" class="btn btn-info btn-sm">Lihat BAP</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
        $('.status_jadwal').on('change', function() {
            const jadwal_acara_id = $(this).data('id');
            const status_jadwal_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/koordinator/acara/ubahStatusJadwal",
                type: 'post',
                data: {
                    jadwal_acara_id: jadwal_acara_id,
                    status_jadwal_id: status_jadwal_id
                },
                success: function() {
                    document.location.href = "/koordinator/acara/jadwal-acara?acara_id=<?= $acara->id ?>";
                }
            });
            
        });
        
    </script>
@endsection