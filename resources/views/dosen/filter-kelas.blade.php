<h5 class="card-title header-title border-bottom p-3 mb-0">Data Peserta Sertifikasi</h5>
<div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Peserta</th>
                <th scope="col">Kelas</th>
                <th scope="col">Acara yang diikuti</th>
                @if (session()->get('role_dosen') != "kaprodi")
                    <th scope="col">Jumlah Tagihan</th>
                    <th scope="col">Sisa Tagihan</th>
                    <th scope="col">Status Tagihan</th>
                @endif
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($list_peserta_sertifikasi->count())
            @foreach ($list_peserta_sertifikasi as $sertifikasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sertifikasi->mahasiswa->nim }}</td>
                <td>{{ $sertifikasi->mahasiswa->user->nama }}</td>
                <td>{{ $sertifikasi->mahasiswa->kelas->kelas }}</td>
                <td>{{ $sertifikasi->acara->nama }}</td>
                @if (session()->get('role_dosen') != "kaprodi")
                <td>Rp.{{ number_format($sertifikasi->tagihan,2,',','.') }}</td>
                <td>Rp.{{ number_format($sertifikasi->sisa_tagihan,2,',','.') }}</td>
                <td>
                    @if ($sertifikasi->sisa_tagihan > 0)
                    Belum Lunas
                    @else
                    Lunas
                    @endif
                </td>
                @endif
                <td>
                    {{ $sertifikasi->statusPeserta->status }}
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8">Data tidak ditemukan</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<h5 class="card-title header-title border-bottom p-3 mb-0">Data Peserta Pelatihan</h5>
<div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Peserta</th>
                <th scope="col">Kelas</th>
                <th scope="col">Acara yang diikuti</th>
                @if (session()->get('role_dosen') != "kaprodi")
                    <th scope="col">Jumlah Tagihan</th>
                    <th scope="col">Sisa Tagihan</th>
                    <th scope="col">Status Tagihan</th>
                @endif
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($list_peserta_pelatihan->count())
            @foreach ($list_peserta_pelatihan as $pelatihan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pelatihan->mahasiswa->nim }}</td>
                <td>{{ $pelatihan->mahasiswa->user->nama }}</td>
                <td>{{ $sertifikasi->mahasiswa->kelas->kelas }}</td>
                <td>{{ $pelatihan->acara->nama }}</td>
                @if (session()->get('role_dosen') != "kaprodi")
                <td>Rp.{{ number_format($pelatihan->tagihan,2,',','.') }}</td>
                <td>Rp.{{ number_format($pelatihan->sisa_tagihan,2,',','.') }}</td>
                <td>
                    @if ($pelatihan->sisa_tagihan > 0)
                    Belum Lunas
                    @else
                    Lunas
                    @endif
                </td>
                @endif
                <td>
                    {{ $pelatihan->statusPeserta->status }}
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8">Data tidak ditemukan</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>