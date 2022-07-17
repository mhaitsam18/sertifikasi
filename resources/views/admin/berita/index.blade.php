@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Berita Saya</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive col-lg-12">
        <a href="/dashboard/beritas/create" class="btn btn-primary mb-3">Buat Berita Baru</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Jumlah Komentar</th>
                    <th scope="col">Jumlah Like</th>
                    <th scope="col">Jumlah Share</th>
                    <th scope="col">Jumlah Viewer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_berita as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->komentar->count() }}</td>
                        <td>{{ $berita->like->count() }}</td>
                        <td>0</td>
                        <td>{{ $berita->views }}</td>
                        <td>
                            @if ($berita->publish_at)
                                <a href="/dashboard/berita/takedown/{{ $berita->slug }}" class="badge bg-danger text-decoration-none text-light">Takedown</a>
                            @else
                                <a href="/dashboard/berita/publish/{{ $berita->slug }}" class="badge bg-success text-decoration-none text-light">Publish Sekarang</a>
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/beritas/{{ $berita->slug }}" class="badge bg-info" title="Detail"><span data-feather="eye"></span></a>
                            <a href="/dashboard/beritas/{{ $berita->slug }}/edit" class="badge bg-warning" title="edit"><span data-feather="edit"></span></a>
                            {{-- <a href="/dashboard/beritas/{{ $berita->id }}" class="badge bg-danger"><span data-feather="x-circle"></span></a> --}}
                            @if ($berita->deleted_at)
                                <form action="/dashboard/berita/restore/" method="post" class="d-inline">
                                    {{-- @method('restore') --}}
                                    <input type="hidden" name="id" value="{{ $berita->id }}">
                                    @csrf
                                    <button type="submit" class="badge bg-success border-0" onclick="return confirm('Are Your Sure?')" title="Pulihkan/Aktifkan"><span data-feather="check-circle"></span></button>
                                </form>
                            @else
                                <form action="/dashboard/beritas/{{ $berita->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are Your Sure?')" title="Hapus/Nonaktifkan"><span data-feather="x-circle"></span></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection