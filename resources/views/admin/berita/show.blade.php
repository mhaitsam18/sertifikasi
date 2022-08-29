@extends('admin.layouts.main')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $berita->judul }}</h2>  
                <div>
                    {{-- By. <a href="/authors/<?= $berita->user->username ?>">{{ $berita->user->name }}</a>  --}}
                    {{-- By. <a href="berita?author=<?= $berita->user->username ?>">{{ $berita->user->name }}</a>  --}}
                    {{-- in <a href="/categories/{{ $berita->category->slug }}">{{ $berita->category->name }}</a> --}}
                    {{-- in <a href="/berita?category={{ $berita->category->slug }}">{{ $berita->category->name }}</a> --}}
                    <a href="/dashboard/beritas" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Berita Saya</a>
                    <a href="/dashboard/beritas/{{ $berita->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                    <form action="/dashboard/beritas/{{ $berita->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are Your Sure?')"><span data-feather="x-circle"></span> Delete</button>
                    </form>
                </p>
                @if ($berita->thumbnail)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset("storage/$berita->thumbnail") }}" alt="{{ $berita->judul }}" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $berita->judul }}" alt="{{ $berita->judul }}" class="img-fluid mt-3">
                @endif
                <article class="my-3 fs-5">
                    {!! $berita->isi !!}
                </article>
                <h5 class="mb-4 pb-1 header-title">Comments ({{ $list_komentar->count() }})</h5>
                @if ($list_komentar->count())
                    @foreach ($list_komentar as $komentar)
                        <div class="media mb-4 font-size-14">
                            <div class="mr-3">
                                {{-- <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="{{ asset("storage/".$komentar->peserta->mahasiswa->user->foto) }}"> </a> --}}
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 font-size-15">
                                    {{ $komentar->user->nama }}
                                </h5>
                                <p class="text-muted mb-1">
                                    {{ $komentar->komentar }}
                                </p>
                                <form action="/dashboard/berita/komentar/{{ $komentar->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="komentar_id" value="{{ $komentar->id }}">
                                    <button type="submit" class="btn btn-link text-decoration-none">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="media mb-4 font-size-14">
                        <div class="media-body">
                            <p class="text-muted mb-1">
                                Tidak Ada Komentar
                            </p>
                        </div>
                    </div>
                @endif
                {{-- <a href="/dashboard/berita" class="d-block">Back to Blog</a> --}}
            </div>
        </div>
    </div>
@endsection