@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengambilan Sertifikat : {{ $acara->nama }}</h1>
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
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Status Pengambilan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_nilai as $nilai)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nilai->peserta->mahasiswa->user->nama }}</td>
                        <td>{{ $nilai->peserta->mahasiswa->nim }}</td>
                        <td>{{ $nilai->nilai }}</td>
                        <td>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input is_take" type="checkbox" name="is_take" id="is_take" @checked($nilai->is_take) data-id="{{ $nilai->id }}" value="1">
                                    <label class="form-check-label" for="is_take">
                                      diambil
                                    </label>
                                  </div>
                            </form>
                        </td>
                        <td>
                            <a href="/dashboard/sertifikat/{{ $nilai->id }}" class="btn btn-link btn-sm">Sertifikat Lainnya</a>
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
        $('.is_take').on('click', function() {
            const nilai_id = $(this).data('id');
            var is_take = $(this).val();
            if ($(this).is(':checked')) {
                is_take = 1;
            } else {
                is_take = 0;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/dashboard/sertifikat/isTake",
                type: 'post',
                data: {
                    nilai_id: nilai_id,
                    is_take: is_take
                },
                success: function() {
                    document.location.href = "/dashboard/sertifikat/<?= $acara->id ?>";
                }
            });
            
        });
        
    </script>
@endsection
