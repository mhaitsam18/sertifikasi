@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Promosi/Validasi Pelatihan dan Sertifikasi</h1>
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
                    {{-- <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Kuota</th> --}}
                    <th scope="col">Kode Koordinator</th>
                    <th scope="col">Status Acara</th>
                    <th scope="col">Validasi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_acara as $acara)
                    <?php 
                    $warna = ''
                    ?>
                    @if ($acara->is_valid == 1)
                        <?php $warna = "table-success"; ?>
                    @elseif ($acara->is_valid == 2)
                        <?php $warna = "table-danger"; ?>
                    @endif
                    <tr class="{{ $warna }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $acara->nama }}</td>
                        <td>{{ $acara->kategoriAcara->kategori }}</td>
                        {{-- <td>{{ $acara->lokasi }}</td>
                        <td>{{ $acara->biaya }}</td>
                        <td>{{ $acara->kuota }}</td> --}}
                        <td>{{ $acara->Koordinator->kode_dosen }}</td>
                        <td>{{ $acara->statusAcara->status }}</td>
                        <td>
                            @if ($acara->is_valid == 1)
                                <span class="badge bg-success">Valid</span>
                            @elseif ($acara->is_valid == 2)
                                <span class="badge bg-danger">Tidak Valid</span>
                            @else
                                <span class="badge bg-secondary">Belum divalidasi</span>
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/acara/detail/{{ $acara->id }}" class="btn btn-primary btn-sm">Detail</a>
                            @if (!$acara->is_valid)
                                <a href="/dashboard/acara/validasi?acara_id={{ $acara->id }}&validasi=1" class="btn btn-success btn-sm text-decoration-none text-light">Valid</a>
                                <a href="/dashboard/acara/validasi?acara_id={{ $acara->id }}&validasi=2" class="btn btn-danger btn-sm text-decoration-none text-light">Tidak Valid</a>
                            @else
                                @if ($acara->is_valid == 1)
                                    <a href="/dashboard/peserta?acara_id={{ $acara->id }}" class="btn btn-info btn-sm text-decoration-none text-light">List Peserta</a>
                                @endif
                                <form action="">
                                    <div class="form-group mt-1">
                                        <select name="status_id" id="status_id" class="form-select status_id" data-id="{{ $acara->id }}">
                                            @foreach ($list_status as $status)
                                                @if ($status->id == $acara->status_acara_id)
                                                    <option value="{{ $status->id }}" selected>{{ $status->status }} </option>
                                                @else
                                                    <option value="{{ $status->id }}">{{ $status->status }} {{ ($status->id == 2) ? "(Publish Acara)" : "" }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
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
