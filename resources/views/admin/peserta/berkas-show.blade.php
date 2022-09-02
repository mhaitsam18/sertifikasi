<div class="modal-body">
                        
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mahasiswa->user->nama  }}</h5>
            <h5 class="card-title">{{ $mahasiswa->nim  }}</h5>
            <h6 class="card-title">KTM</h6>
            <img class="img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.$mahasiswa->scan_ktm) }}">
            
            <h6 class="card-title">Kartu Studi Mahasiswa</h6>
            @if ($mahasiswa->ksm)
            <a href="{{ asset('storage/'.$mahasiswa->ksm) }}" target="_blank" class="btn btn-link"><i class="fa-solid fa-file"></i> KSM_{{ $mahasiswa->nim }}.pdf</a>
            @else
            <span class="text-danger fw-bold">Mahasiswa ini belum mengupload KSM</span>
            @endif
            
            <h6 class="card-title">Transkip Nilai</h6>
            @if ($mahasiswa->transkip_nilai)
            <a href="{{ asset('storage/'.$mahasiswa->transkip_nilai) }}" target="_blank" class="btn btn-link"><i class="fa-solid fa-file"></i> TN_{{ $mahasiswa->nim }}.pdf</a>
            @else
            <span class="text-danger fw-bold">Mahasiswa ini belum mengupload Transkip Nilai</span>
            @endif
        </div>
    </div>
</div>
<div class="modal-footer">
    @if ($peserta->status_peserta_id == 1)
        <form action="/dashboard/peserta/validasi-berkas/{{ $peserta->id }}" method="post">
            @csrf
            <input type="hidden" name="validasi" value="1">
            <button type="submit" class="btn btn-primary">Valid</button>
        </form>
        <form action="/dashboard/peserta/validasi-berkas/{{ $peserta->id }}" method="post">
            @csrf
            <input type="hidden" name="validasi" value="0">
            <button type="submit" class="btn btn-danger">Tidak Valid</button>
        </form>
    @elseif($peserta->berkas_valid_at)
    <i>Telah divalidasi pada Tanggal: {{ date('d-m-Y H:i:s',strtotime($peserta->berkas_valid_at)) }}</i>
    @endif
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>