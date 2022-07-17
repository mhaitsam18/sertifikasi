@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Peserta</h1>
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
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Acara yang diikuti</th>
                    <th scope="col">Jumlah Tagihan</th>
                    <th scope="col">Sisa Tagihan</th>
                    <th scope="col">Status Tagihan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_peserta as $peserta)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peserta->mahasiswa->nim }}</td>
                        <td>{{ $peserta->mahasiswa->user->nama }}</td>
                        <td>{{ $peserta->acara->nama }}</td>
                        <td>Rp.{{ number_format($peserta->tagihan,2,',','.') }}</td>
                        <td>Rp.{{ number_format($peserta->sisa_tagihan,2,',','.') }}</td>
                        <td>
                            @if ($peserta->sisa_tagihan > 0)
                                Belum Lunas
                            @else
                                Lunas
                            @endif
                        </td>
                        <td>
                            <form action="">
                                <div class="form-group mt-1">
                                    <select name="status_id" id="status_id" class="form-select status_id" data-id="{{ $peserta->id }}">
                                        @foreach ($list_status as $status)
                                            @if ($status->id == $peserta->status_peserta_id)
                                                <option value="{{ $status->id }}" selected>{{ $status->status }} </option>
                                            @else
                                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </td>
                        <td>
                            <td>
                                <a href="/dashboard/pembayaran?peserta_id={{ $peserta->id }}" class="btn btn-success btn-sm">List Pembayaran</a>
                            </td>
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
            const peserta_id = $(this).data('id');
            const status_peserta_id = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/dashboard/peserta/ubahStatus",
                type: 'post',
                data: {
                    peserta_id: peserta_id,
                    status_peserta_id: status_peserta_id
                },
                success: function() {
                    document.location.href = "/dashboard/peserta";
                }
            });
            
        });
        
    </script>
@endsection