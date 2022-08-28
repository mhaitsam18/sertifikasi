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