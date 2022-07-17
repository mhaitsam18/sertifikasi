@extends('admin.layouts.main')
@section('container')
<?php 
use Illuminate\Support\Carbon;
 ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengambilan Sertifikat</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Acara</th>
                    <th scope="col">Kategori Acara</th>
                    <th scope="col">Kode Koordinator</th>
                    <th scope="col">Tanggal Berakhirnya Acara</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_acara as $acara)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $acara->nama }}</td>
                        <td>{{ $acara->kategoriAcara->kategori }}</td>
                        <td>{{ $acara->Koordinator->kode_dosen }}</td>
                        <td>{{ Carbon::parse($acara->pelaksanaan_tutup)->translatedFormat('d F Y') }}</td>
                        <td>
                            @if ($acara->is_valid == 1)
                                <a href="/dashboard/sertifikat/{{ $acara->id }}" class="btn btn-info btn-sm text-decoration-none text-light">List Sertifikat</a>
                            @endif
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="/jquery/jquery.min.js"></script>
    <script src="/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script type="text/javascript">
        $('.status_id').on('change', function() {
            const acara_id = $(this).data('id');
            const status_acara_id = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/dashboard/acara/ubahStatus",
                type: 'post',
                data: {
                    acara_id: acara_id,
                    status_acara_id: status_acara_id
                },
                success: function() {
                    document.location.href = "/dashboard/acara";
                }
            });
            
        });
        
    </script>
@endsection
