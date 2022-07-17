@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Berita Baru</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/beritas" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail Berita</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail" onchange="previewThumbnail()">
                @error('thumbnail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Konten</label>
                @error('isi')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
                <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
                <trix-editor input="isi"></trix-editor>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="publish_at" name="publish_at">
                    <label class="form-check-label" for="publish_at">
                      Publish
                    </label>
                  </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/dashboard/berita/checkSlug?judul='+judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
 
        });

        // document.addEventListener('trix-file-accept', function(e) {
        //     e.preventDefault();
        // });

        function previewThumbnail() {
            const thumbnail = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(thumbnail.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection