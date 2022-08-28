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
        <table class="table table-responsive table-striped table-sm">
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
                        <th scope="row">{{ $loop->iteration }}</th>
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
                                <button type="button" class="btn btn-info btn-sm berkas-modal" data-bs-toggle="modal" data-bs-target="#berkasModal" data-id="{{ $peserta->mahasiswa_id }}">Lihat Berkas</button>
                            </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="berkasModal" tabindex="-1" aria-labelledby="berkasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="berkasModalLabel">Berkas Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body berkas-show">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
        $('.berkas-modal').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/dashboard/peserta/berkas-show",
                type: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $(".berkas-show").html(data);
                }
            });
            
        });
        
    </script>
@endsection