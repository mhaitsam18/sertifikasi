@extends('admin.layouts.main')
@section('container')
    <?php 
    use Illuminate\Support\Carbon;
    ?>
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
                    <th scope="col">Waktu Upload</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">No. Tagihan</th>
                    <th scope="col">Nama Acara</th>
                    <th scope="col">Jumlah Tagihan</th>
                    <th scope="col">Jumlah Transfer</th>
                    <th scope="col">Status Validasi</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_pembayaran as $pembayaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($pembayaran->created_at)->translatedFormat('d F Y H:i:s') }}</td>
                        <td>{{ $pembayaran->nim }}</td>
                        <td>{{ $pembayaran->nama_peserta }}</td>
                        <td>inv{{ $pembayaran->acara_id.$pembayaran->mahasiswa_id.$pembayaran->peserta_id }}</td>
                        <td>{{ $pembayaran->nama_acara }}</td>
                        <td>Rp.{{ number_format($pembayaran->tagihan,2,',','.') }}</td>
                        <td>Rp.{{ number_format($pembayaran->nominal_transfer,2,',','.') }}</td>
                        <td>
                            @if ($pembayaran->validasi == 0)
                                <span class="badge bg-secondary py-1">
                                    Belum divalidasi
                                </span>
                            @elseif ($pembayaran->validasi == 1)
                                <span class="badge bg-success py-1">
                                    Valid
                                </span>
                            @else
                                <span class="badge bg-danger py-1">
                                    Tidak Valid
                                </span>
                            @endif
                            <!-- Button trigger modal -->
                            @if (!$pembayaran->validasi)
                                <button type="button" class="btn btn-primary mt-1 tombol_validasi" data-bs-toggle="modal" data-bs-target="#validasiModal" data-id="{{ $pembayaran->id_pembayaran }}">
                                    Validasi
                                </button>
                            @endif
                        </td>
                        <td>
                            <ul>
                                <li>Rekening Tujuan : {{ $pembayaran->nomor_rekening }} | {{ $pembayaran->bank }} | {{ $pembayaran->atas_nama }} | {{ $pembayaran->email }}</li>
                                <li>Rekening Pengirim : {{ $pembayaran->rekening_pengirim }}</li>
                                <li>Bank Pengirim : {{ $pembayaran->bank_pengirim }}</li>
                                <li>Atas Nama : {{ $pembayaran->nama_pengirim }}</li>
                                <li>Waktu Transfer : {{ Carbon::parse($pembayaran->waktu_transfer)->translatedFormat('d F Y H:i:s') }}</li>
                                <li>Nominal Transfer : Rp.{{ number_format($pembayaran->nominal_transfer,2,',','.') }}</li>
                                <li>Bukti Transfer : <a href="{{ asset('storage/'.$pembayaran->bukti) }}"><i class="uil  uil-download-alt"></i> Download File</a></li>
                                <li>Catatan : {{ $pembayaran->catatan }}</li>
                                <li>Keterangan Admin : {{ $pembayaran->Keterangan }}</li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="validasiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validasiModalLabel">Validasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/peserta/pembayaran/validasi" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="peserta_id" id="peserta_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="no_tagihan" class="form-label">No. Tagihan</label>
                            <input type="text" class="form-control" name="no_tagihan" id="no_tagihan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nominal_transfer" class="form-label">Nominal Transfer</label>
                            <input type="text" class="form-control" name="nominal_transfer" id="nominal_transfer" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tagihan" class="form-label">Tagihan</label>
                            <input type="text" class="form-control" name="tagihan" id="tagihan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="sisa_tagihan" class="form-label">Sisa Tagihan</label>
                            <input type="text" class="form-control" name="sisa_tagihan" id="sisa_tagihan" readonly>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_valid" id="belum_valid" value="0">
                            <label class="form-check-label" for="belum_valid">
                                Belum divalidasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_valid" id="valid" value="1">
                            <label class="form-check-label" for="valid">
                                Valid
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_valid" id="tidak_valid" value="2">
                            <label class="form-check-label" for="tidak_valid">
                                Tidak Valid
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Tambahkan Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan"> </textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
        $('.tombol_validasi').on('click', function() {
            const pembayaran_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/dashboard/peserta/getPembayaranById",
                data: {
                    pembayaran_id : pembayaran_id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#id').val(data.id_pembayaran);
                    $('#peserta_id').val(data.peserta_id);
                    $('#nominal_transfer').val(data.nominal_transfer);
                    $('#tagihan').val(data.sisa_tagihan);
                    $('#sisa_tagihan').val(data.sisa_tagihan - data.nominal_transfer);
                    $('#no_tagihan').val("inv"+data.acara_id+data.mahasiswa_id+data.peserta_id);
                    $('#keterangan').val(data.keterangan);
                    $('#is_valid').val(data.is_valid);
                    if(data.is_valid == 0){
                        $('#belum_valid').attr("checked", true);
                    } else if(data.status == 1){
                        $('#valid').attr("checked", true);
                    } else if(data.status == 2){
                        $('#tidak_valid').attr("checked", true);
                    }
                }
            });
            
        });
        
    </script>
@endsection