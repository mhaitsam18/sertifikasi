@extends('mahasiswa.layouts.main')

@section('container')
<?php 
    use Illuminate\Support\Facades\Storage;
    use App\Models\Chat;
    use Illuminate\Support\Carbon;
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Profil</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <img src="{{ asset("storage/".auth()->user()->foto) }}" alt=""
                        class="avatar-lg rounded-circle" />
                    <h5 class="mt-2 mb-0">{{ auth()->user()->nama }}</h5>
                    <h6 class="text-muted font-weight-normal mt-2 mb-0">{{ auth()->user()->mahasiswa->nim }}</h6>
                    <h6 class="text-muted font-weight-normal mt-1 mb-4">{{ auth()->user()->alamat }}</h6>

                    {{-- <div class="progress mb-4" style="height: 14px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            <span class="font-size-12 font-weight-bold">Your Profile is <span
                                    class="font-size-11">60%</span> completed</span>
                        </div>
                    </div> --}}

                    <a href="/mahasiswa/edit" class="btn btn-primary btn-sm mr-1">Edit</a>
                    {{-- <button type="button" class="btn btn-white btn-sm">Message</button> --}}
                </div>

                <!-- profile  -->
                <div class="mt-5 pt-2 border-top">
                    {{-- <h4 class="mb-3 font-size-15">Tentang</h4>
                    <p class="text-muted mb-4">{{ auth()->user()->tentang}}</p> --}}
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 text-muted">
                            <tbody>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>{{ auth()->user()->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama</th>
                                    <td>{{ auth()->user()->agama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat, Tanggal Lahir</th>
                                    <td>{{ auth()->user()->tempat_lahir.', '.$tanggal_lahir }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top">
                    <h4 class="mb-3 font-size-15">Informasi Kontak</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 text-muted">
                            <tbody>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Telepon</th>
                                    <td>{{ auth()->user()->nomor_telepon }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>{{ auth()->user()->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top">
                    <h4 class="mb-3 font-size-15">Skills</h4>
                    <label class="badge badge-soft-primary">UI design</label>
                    <label class="badge badge-soft-primary">UX</label>
                    <label class="badge badge-soft-primary">Sketch</label>
                    <label class="badge badge-soft-primary">Photoshop</label>
                    <label class="badge badge-soft-primary">Frontend</label>
                </div>
            </div>
        </div>
        <!-- end card -->

    </div>

    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-activity-tab" data-toggle="pill"
                            href="#pills-activity" role="tab" aria-controls="pills-activity"
                            aria-selected="true">
                            Aktivitas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-messages-tab" data-toggle="pill"
                            href="#pills-messages" role="tab" aria-controls="pills-messages"
                            aria-selected="false">
                            Pesan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-projects-tab" data-toggle="pill"
                            href="#pills-projects" role="tab" aria-controls="pills-projects"
                            aria-selected="false">
                            Sedang diikuti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-tasks-tab" data-toggle="pill"
                            href="#pills-tasks" role="tab" aria-controls="pills-tasks"
                            aria-selected="false">
                            Histori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-files-tab" data-toggle="pill"
                            href="#pills-files" role="tab" aria-controls="pills-files"
                            aria-selected="false">
                            Sertifikat
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        @php 
                            $tanggal = ''; 
                            $run = false; 
                        @endphp
                        @if ($list_jadwal->count()>0)
                            @foreach($list_jadwal as $jadwal)
                                @if($jadwal->tanggal != $tanggal)
                                    @php 
                                        $tanggal = $jadwal->tanggal; 
                                    @endphp
                                    @if ($run == true)
                                            </div>
                                        </ul>
                                    @endif
                                    @php
                                        $run = true;
                                    @endphp
                                    @if($jadwal->tanggal == date('Y-m-d'))
                                        <h5 class="mt-3">Hari Ini</h5>
                                    @else
                                        <h5 class="mt-3">{{ Carbon::parse($jadwal->tanggal)->translatedFormat('l, j F Y') }}</h5>
                                    @endif
                                    <div class="left-timeline mt-3 mb-3 pl-4">
                                        <ul class="list-unstyled events mb-0">
                                @endif
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    {{ $jadwal->waktu_dimulai }}
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">{{ $jadwal->nama_acara }}</h6>
                                                <p class="text-muted font-size-14">{{ $jadwal->materi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            {!! "</div></ul>" !!}
                        @else
                            <h5 class="mt-3">Jadwal Tidak tersedia</h5>
                        @endif
                        {{-- <h5 class="mt-3">Hari Ini</h5>
                        <div class="left-timeline mt-3 mb-3 pl-4">
                            <ul class="list-unstyled events mb-0">
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    02 hours ago
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">Designing
                                                    Shreyu Admin</h6>
                                                <p class="text-muted font-size-14">Shreyu Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    21 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">UX and UI for
                                                    Ubold Admin</h6>
                                                <p class="text-muted font-size-14">Ubold Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    22 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">UX and UI for
                                                    Hyper Admin</h6>
                                                <p class="text-muted font-size-14">Hyper Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <h5 class="mt-4">Last Week</h5>
                        <div class="left-timeline mt-3 pl-4">
                            <ul class="list-unstyled events mb-0">
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    02 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">Designing
                                                    Shreyu Admin</h6>
                                                <p class="text-muted font-size-14">Shreyu Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    21 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">UX and UI for
                                                    Ubold Admin</h6>
                                                <p class="text-muted font-size-14">Ubold Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    22 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">UX and UI for
                                                    Hyper Admin</h6>
                                                <p class="text-muted font-size-14">Hyper Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <h5 class="mt-4">Last Month</h5>
                        <div class="left-timeline mt-3 pl-4">
                            <ul class="list-unstyled events mb-0">
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    02 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">Designing
                                                    Shreyu Admin</h6>
                                                <p class="text-muted font-size-14">Shreyu Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    21 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">UX and UI for
                                                    Ubold Admin</h6>
                                                <p class="text-muted font-size-14">Ubold Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="pb-4">
                                        <div class="media">
                                            <div class="event-date text-center mr-4">
                                                <div
                                                    class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                    22 hours ago</div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-size-15 mt-0 mb-1">UX and UI for
                                                    Hyper Admin</h6>
                                                <p class="text-muted font-size-14">Hyper Admin - A
                                                    responsive admin and dashboard template</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>

                    <!-- messages -->
                    <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                        <h5 class="mt-3">Chat</h5>
                        <ul class="list-unstyled">
                            @foreach ($data_pesan as $pesan)
                                @php
                                    $user = [
                                        'my_id' => auth()->user()->id,
                                        'other_id' => $pesan->id,
                                    ];
                                    $chat = Chat::where(function ($query) use ($user) {
                                        $query->where("pengirim_id", $user['other_id'])
                                            ->Where("penerima_id", $user['my_id']);
                                        })
                                        ->orWhere(function ($query) use ($user) {
                                            $query->where("pengirim_id", $user['my_id'])
                                                ->Where("penerima_id", $user['other_id']);
                                        })
                                        ->orderBy('chat.id', 'DESC')
                                        ->first();
                                @endphp
                                <li class="py-3 border-bottom">
                                    <div class="media">
                                        <div class="mr-3">
                                            <img src="{{ asset('storage/'.$pesan->foto) }}" alt="" class="avatar-md rounded-circle">
                                        </div>
                                        <div class="media-body overflow-hidden">
                                            <h5 class="font-size-15 mt-2 mb-1">
                                                <a href="#" class="text-dark chat" data-user_id="{{ $pesan->id }}">{{ $pesan->nama }}</a>
                                            </h5>
                                            <p class="text-muted font-size-13 text-truncate mb-0"> 
                                                @if (isset($chat))
                                                    {{ $chat->pesan }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="chatbox overflow-hidden" style="display: none;" id="show-chat">
                            <div class="bg-primary p-2">
                                <div class="media">
                                    <img src="/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded ml-1 mr-2">
                                    <div class="media-body">
                                        <h5 class="font-size-13 text-white m-0"></h5>
                                        <small class="text-white-50"><i class="uil uil-circle font-size-11 text-success mr-1"></i></small>
                                    </div>
                                    <div class="float-right font-size-18 mt-1">
                                        <a href="#" class="text-white mr-2"><i class="uil uil-comment-alt-notes font-size-16"></i></a>
                                        <a href="#" class="chat-close text-white mr-2"><i class="uil uil-multiply font-size-14"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-conversation p-2">
                                <ul class="conversation-list slimscroll" style="max-height: 220px;"  id="show-chat-2">
                                    
                                </ul>
                                <div class="position-relative chat-input">
                                    <textarea type="text" class="form-control" placeholder="Type your message..."></textarea>
                                    <div class="chat-link">
                                        <a href="#" class="p-1"><i class="uil-navigator"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-sm">Load more</a>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-projects" role="tabpanel"
                        aria-labelledby="pills-projects-tab">

                        <h5 class="mt-3">Acara berlangsung</h5>

                        <div class="row mt-3">
                            @foreach ($list_acara as $acara)
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="badge badge-{{ ($acara->kategori_acara_id == 1) ? "primary" : "success" }} float-right">{{ $acara->kategoriAcara->kategori }}</div>
                                            <p class="text-success text-uppercase font-size-12 mb-2">{{ $acara->nama_penyelenggara }}</p>
                                            <h5><a href="#" class="text-dark">{{ $acara->nama }}</a></h5>
                                            <p class="text-muted mb-4">{{ Str::limit(strip_tags($acara->deskripsi), 100, '...') }}</p>

                                            <div>
                                                @foreach ($acara->peserta as $peserta)
                                                    <a href="javascript: void(0);">
                                                        <img src="{{ asset('storage/'.$peserta->mahasiswa->user->foto) }}" alt="" class="avatar-sm m-1 rounded-circle">
                                                    </a>    
                                                @endforeach
                                                {{-- <a href="javascript: void(0);">
                                                    <img src="/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                                </a> --}}
                                            </div>
                                        </div>
                                        <div class="card-body border-top">
                                            <div>
                                                <div>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item pr-2">
                                                            <a href="/mahasiswa/acara/{{ $acara->id }}" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acara dimulai">
                                                                <i class="uil uil-calender mr-1"></i> {{ Carbon::parse($acara->pelaksanaan_buka)->translatedFormat('d M') }}
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item pr-2">
                                                            <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kuota">
                                                                <i class="uil uil-bars mr-1"></i> {{ $acara->kuota }}
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Komentar">
                                                                <i class="uil uil-comments-alt mr-1"></i>
                                                                {{ $acara->rating->count() }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="pt-2">
                                                    <div class="progress" style="height: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="100% completed">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                            @endforeach
                        </div>
                        <!-- end row -->
                    </div>

                    <div class="tab-pane fade" id="pills-tasks" role="tabpanel"
                        aria-labelledby="pills-tasks-tab">
                        <h5 class="mt-3">Histori</h5>

                        <div class="card mb-0 shadow-none">
                            <div class="card-body">
                                @foreach ($list_histori as $histori)
                                    <!-- task -->
                                    <div class="row justify-content-sm-between border-bottom">
                                        <div class="col-lg-6 mb-2 mb-lg-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="task{{ $loop->iteration }}">
                                                <label class="custom-control-label" for="task1">
                                                    {{ $histori->acara->nama }}
                                                </label>
                                            </div> <!-- end checkbox -->
                                        </div> <!-- end col -->
                                        <div class="col-lg-6">
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    <img src="{{ asset('storage/'.$histori->acara->koordinator->user->foto) }}" alt="image" class="avatar-xs rounded-circle" data-toggle="tooltip" data-placement="bottom" title="{{ $histori->acara->koordinator->user->nama }}" />
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <ul class="list-inline font-13 text-sm-right">
                                                        <li class="list-inline-item pr-1">
                                                            <i class='uil uil-schedule font-16 mr-1'></i>
                                                            {{ Carbon::parse($histori->acara->pelaksanaan_tutup)->translatedFormat('d F Y') }}
                                                        </li>
                                                        @if ($histori->nilai)
                                                            <li class="list-inline-item pr-1">
                                                                <i class='uil uil-align-alt font-16 mr-1'></i>
                                                                    
                                                                {{ $histori->nilai->nilai }}
                                                            </li>
                                                        @endif
                                                        <li class="list-inline-item pr-2">
                                                            <i class='uil uil-comment-message font-16 mr-1'></i>
                                                            {{ $histori->acara->rating->count() }}
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <span class="badge badge-soft-{{ ($acara->kategori_acara_id == 1) ? "primary" : "success" }} p-1">{{ $acara->kategoriAcara->kategori }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> <!-- end .d-flex-->
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end task -->
                                @endforeach
                            </div> <!-- end card-body-->
                        </div> <!-- end card -->
                    </div>

                    <div class="tab-pane fade" id="pills-files" role="tabpanel"
                        aria-labelledby="pills-files-tab">
                        <h5 class="mt-3">Files</h5>
                        @foreach ($list_nilai as $nilai)
                            <div class="card mb-2 shadow-none border">
                                <div class="p-1 px-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset("storage/".$nilai->sertifikat) }}"
                                                class="avatar-sm rounded" alt="file-image">
                                        </div>
                                        <div class="col pl-0">
                                            <a href="/get?file=sertifikat&image={{ $nilai->sertifikat }}"
                                                class="text-muted font-weight-bold">{{ str_replace("sertifikat/", "", $nilai->sertifikat) }}</a>
                                            <?php 
                                                // if (Storage::disk('s3')->exists($nilai->sertifikat)) {
                                                    
                                                // }


                                                
                                                $a = array("B", "KB", "MB", "GB", "TB", "PB");
                                                $pos = 0;
                                                $size = Storage::size($nilai->sertifikat);
                                                while ($size >= 1024)
                                                {
                                                    $size /= 1024;
                                                    $pos++;
                                                }
                                                $ukuran = round ($size,2)." ".$a[$pos];
                                            ?>
                                            <p class="mb-0">{{ $ukuran }}</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <button onclick="JavaScript:window.location.href='/get?file=sertifikat&image={{ $nilai->sertifikat }}';" data-toggle="tooltip"
                                                data-placement="bottom" title="Download"
                                                class="btn btn-link text-muted btn-lg p-0">
                                                <i class='uil uil-cloud-download font-size-14'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="card mb-2 shadow-none border">
                            <div class="p-1 px-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="/images/projects/project-1.jpg"
                                            class="avatar-sm rounded" alt="file-image">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);"
                                            class="text-muted font-weight-bold">sales-assets.zip</a>
                                        <p class="mb-0">2.3 MB</p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="javascript:void(0);" data-toggle="tooltip"
                                            data-placement="bottom" title="Download"
                                            class="btn btn-link text-muted btn-lg p-0">
                                            <i class='uil uil-cloud-download font-size-14'></i>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"
                                            class="btn btn-link text-danger btn-lg p-0">
                                            <i class='uil uil-multiply font-size-14'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2 shadow-none border">
                            <div class="p-1 px-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="/images/projects/project-2.jpg"
                                            class="avatar-sm rounded" alt="file-image">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);"
                                            class="text-muted font-weight-bold">new-contarcts.docx</a>
                                        <p class="mb-0">1.25 MB</p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="javascript:void(0);" data-toggle="tooltip"
                                            data-placement="bottom" title="Download"
                                            class="btn btn-link text-muted btn-lg p-0">
                                            <i class='uil uil-cloud-download font-size-14'></i>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"
                                            class="btn btn-link text-danger btn-lg p-0">
                                            <i class='uil uil-multiply font-size-14'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- end attachments -->
                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
@endsection

@section('script')
    <script>
    $(".chat-close").click(function(c) {
        return c.preventDefault(), $(".chatbox").css({
            opacity: "0"
        }).hide(), !1
    }), $(".chat").click(function(c) {
        var loading = '<div class="bg-primary p-2"><div class="media"><div class="media-body"><div class="spinner-border text-secondary" role="status"><span class="sr-only">Loading...</span></div><h5 class="font-size-13 text-white m-0"></h5></div><div class="float-right font-size-18 mt-1"><a href="#" class="text-white mr-2"><i class="uil uil-comment-alt-notes font-size-16"></i></a><a href="#" class="chat-close text-white mr-2"><i class="uil uil-multiply font-size-14"></i></a></div></div></div><div class="chat-conversation p-2"><ul class="conversation-list slimscroll" style="max-height: 220px;"></ul><div class="position-relative chat-input"><input type="text" class="form-control" placeholder="Type your message..."><div class="chat-link"><a href="#" class="p-1"><i class="uil-image"></i></a><a href="#" class="p-1"><i class="uil-navigator"></i></a></div></div></div>';
        $('#show-chat').html(loading);

        const user_id = $(this).data('user_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/chat/get-chat/',
            data: {
                user_id: user_id
            },
            success: function(data) {
                $('#show-chat').html(data);
                $('#show-chat').scrollTop($('#show-chat')[0].scrollHeight);
            }
        });
        return c.preventDefault(), $(".chatbox").css({
            opacity: "0",
            display: "block"
        }).show().animate({
            opacity: 1
        }), !1
    });

    

    function kirimChat(other_id) {
        var pesan = document.getElementById("pesan").value;
        $.ajax({
            type: 'post',
            url: '/chat/kirim-chat',
            data: {
                other_id: other_id,
                pesan: pesan
            },
            success: function(data) {
                $('#pesan').val('');
                $('#show-chat').html(data);
            }
        });
    }

    function getCaret(el) {
        if (el.selectionStart) {
            return el.selectionStart;
        } else if (document.selection) {
            el.focus();
            var r = document.selection.createRange();
            if (r == null) {
                return 0;
            }
            var re = el.createTextRange(),
                rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);
            return rc.text.length;
        }
        return 0;
    }

    $('.text-chat').keyup(function(event) {
        if (event.keyCode == 13) {
            var content = this.value;
            var caret = getCaret(this);
            if (event.shiftKey) {
                this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
                event.stopPropagation();
            } else {
                this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
                $('#kirim-chat').click();
            }
        }
    });
</script>
@endsection