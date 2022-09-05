@extends('admin.layouts.main')
@section('container')
@php
    use Illuminate\Support\Carbon;
@endphp
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->nama }}</h1>
    </div>
    <div class="card">
        <h5 class="card-header">Notifikasi</h5>
        <div class="card-body">
            <h5 class="card-title">Pendaftaran Peserta</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Subjek</th>
                        <th scope="col">Pesan</th>
                        <th scope="col">Nama Peserta</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_notifikasi as $notifikasi)
                        <tr>
                            <th scope="row">{{ Carbon::parse($notifikasi->created_at)->translatedFormat('j F Y') }}</th>
                            <td>{{ $notifikasi->subjek }}</td>
                            <td>{{ $notifikasi->pesan }}</td>
                            <td>{{ $notifikasi->creator->nama }}</td>
                            <td>
                                @if ($notifikasi->kategori_notifikasi_id == 2)
                                    <a href="/dashboard/peserta" class="btn btn-link d-inline">Buka</a>
                                @else
                                    <a href="/dashboard/pembayaran" class="btn btn-link d-inline">Buka</a>
                                @endif
                                <form action="/admin/tutup-notifikasi/{{ $notifikasi->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-link">Tutup</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div class="row">
        </div>
        {{-- <h5 class="card-title">Pembayaran Peserta</h5> --}}
    </div>
@endsection