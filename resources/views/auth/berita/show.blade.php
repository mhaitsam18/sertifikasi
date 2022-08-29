@extends('auth.layouts.home')

@section('container')
<?php 
    use Illuminate\Support\Carbon;
?>
<div class="container marketing">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $berita->judul }}</h2>  
            <div>
                {{-- By. <a href="/authors/<?= $berita->user->username ?>">{{ $berita->user->name }}</a>  --}}
                {{-- By. <a href="berita?author=<?= $berita->user->username ?>">{{ $berita->user->name }}</a>  --}}
                {{-- in <a href="/categories/{{ $berita->category->slug }}">{{ $berita->category->name }}</a> --}}
                {{-- in <a href="/berita?category={{ $berita->category->slug }}">{{ $berita->category->name }}</a> --}}
                <a href="/berita" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
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
            {{-- <a href="/dashboard/berita" class="d-block">Back to Blog</a> --}}
        </div>
    </div>
</div>
<!-- end row -->
@endsection