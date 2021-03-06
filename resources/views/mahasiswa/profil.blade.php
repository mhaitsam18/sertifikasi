@extends('mahasiswa.layouts.main')

@section('container')
<?php 
    use Illuminate\Support\Facades\Storage;
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
                    <h4 class="mb-3 font-size-15">Tentang</h4>
                    <p class="text-muted mb-4">{{ auth()->user()->tentang}}</p>
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
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel"
                        aria-labelledby="pills-activity-tab">
                        <h5 class="mt-3">Hari Ini</h5>
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
                        </div>
                    </div>

                    <!-- messages -->
                    <div class="tab-pane" id="pills-messages" role="tabpanel"
                    aria-labelledby="pills-messages-tab">
                        <h5 class="mt-3">Messages</h5>
                        <ul class="list-unstyled">
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="/images/users/avatar-2.jpg" alt=""
                                            class="avatar-md rounded-circle">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">John Jack</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">
                                            The
                                            languages only differ in their grammar</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="/images/users/avatar-3.jpg" alt=""
                                            class="avatar-md rounded-circle">

                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">Theodore</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">
                                            Everyone realizes why a new common language </p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="avatar-md rounded-circle bg-soft-primary mr-3">
                                        <span
                                            class="font-size-18 avatar-title text-primary font-weight-semibold">
                                            M
                                        </span>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">Michael</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">To
                                            an
                                            English person, it will seem like simplified</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="/images/users/avatar-5.jpg" alt=""
                                            class="avatar-md rounded-circle">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">Tony Lindsey</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">If
                                            several languages coalesce the grammar</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="avatar-md rounded-circle bg-soft-primary mr-3">
                                        <span
                                            class="font-size-18 avatar-title text-primary font-weight-semibold">
                                            R
                                        </span>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">Robert Wilke</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">
                                            Their separate existence is a myth</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="/images/users/avatar-7.jpg" alt=""
                                            class="avatar-md rounded-circle">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">James</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">
                                            The European languages are members.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="avatar-md rounded-circle bg-soft-primary mr-3">
                                        <span
                                            class="font-size-18 avatar-title text-primary font-weight-semibold">
                                            B
                                        </span>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">Brian</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">At
                                            vero eos et accusamus et iusto odio</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="/images/users/avatar-5.jpg" alt=""
                                            class="avatar-md rounded-circle">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                class="text-dark">Aaron Nickel</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">
                                            Itaque earum rerum hic tenetur a sapiente</p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-sm">Load more</a>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-projects" role="tabpanel"
                        aria-labelledby="pills-projects-tab">

                        <h5 class="mt-3">Projects</h5>

                        <div class="row mt-3">
                            <div class="col-xl-4 col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="badge badge-success float-right">Completed</div>
                                        <p class="text-success text-uppercase font-size-12 mb-2">Web
                                            Design</p>
                                        <h5><a href="#" class="text-dark">Landing page Design</a>
                                        </h5>
                                        <p class="text-muted mb-4">If several languages coalesce,
                                            the grammar of the resulting language is more regular.
                                        </p>

                                        <div>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-2.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-3.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div>
                                            <div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> 15
                                                            Dec
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Tasks">
                                                            <i class="uil uil-bars mr-1"></i> 56
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments">
                                                            <i
                                                                class="uil uil-comments-alt mr-1"></i>
                                                            224
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pt-2">
                                                <div class="progress" style="height: 5px;"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="100% completed">
                                                    <div class="progress-bar bg-success"
                                                        role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-4 col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="badge badge-warning float-right">Pending</div>
                                        <p class="text-warning text-uppercase font-size-12 mb-2">
                                            Android</p>
                                        <h5><a href="#" class="text-dark">App Design and Develop</a>
                                        </h5>
                                        <p class="text-muted mb-4">To achieve this, it would be
                                            necessary to have uniform grammar and more common words.
                                        </p>
                                        <div>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-4.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-5.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <div
                                                    class="avatar-sm font-weight-bold d-inline-block m-1">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-warning text-warning">
                                                        2+
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div>
                                            <div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> 28
                                                            Nov
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Tasks">
                                                            <i class="uil uil-bars mr-1"></i> 62
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments">
                                                            <i
                                                                class="uil uil-comments-alt mr-1"></i>
                                                            196
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pt-2">
                                                <div class="progress" style="height: 5px;"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="72% completed">
                                                    <div class="progress-bar bg-warning"
                                                        role="progressbar" style="width: 72%;"
                                                        aria-valuenow="72" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-4 col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="badge badge-success float-right">Completed</div>
                                        <p class="text-success text-uppercase font-size-12 mb-2">Web
                                            Design</p>
                                        <h5><a href="#" class="text-dark">New Admin Design</a></h5>
                                        <p class="text-muted mb-4">To an English person, it will
                                            seem like simplified english, as a skeptical Cambridge.
                                        </p>

                                        <div>
                                            <a href="javascript: void(0);">
                                                <div
                                                    class="avatar-sm font-weight-bold d-inline-block m-1">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        H
                                                    </span>
                                                </div>
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-7.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div>
                                            <div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> 19
                                                            Nov
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Tasks">
                                                            <i class="uil uil-bars mr-1"></i> 69
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments">
                                                            <i
                                                                class="uil uil-comments-alt mr-1"></i>
                                                            201
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pt-2">
                                                <div class="progress" style="height: 5px;"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="100% completed">
                                                    <div class="progress-bar bg-success"
                                                        role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-4 col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="badge badge-warning float-right">Pending</div>
                                        <p class="text-warning text-uppercase font-size-12 mb-2">
                                            Android</p>
                                        <h5><a href="#" class="text-dark">Custom Software
                                                Development</a></h5>
                                        <p class="text-muted mb-4">Their separate existence is a
                                            myth. For science, music, sport, etc uses the vocabulary
                                        </p>

                                        <div>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-6.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <div
                                                    class="avatar-sm font-weight-bold d-inline-block m-1">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                        K
                                                    </span>
                                                </div>
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-7.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="card-body border-top">

                                        <div>
                                            <div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> 02
                                                            Nov
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Tasks">
                                                            <i class="uil uil-bars mr-1"></i> 72
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments">
                                                            <i
                                                                class="uil uil-comments-alt mr-1"></i>
                                                            184
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pt-2">
                                                <div class="progress" style="height: 5px;"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="60% completed">
                                                    <div class="progress-bar bg-warning"
                                                        role="progressbar" style="width: 60%;"
                                                        aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="60"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="badge badge-success float-right">Completed</div>
                                        <p class="text-success text-uppercase font-size-12 mb-2">Web
                                            Design</p>
                                        <h5><a href="#" class="text-dark">Brand logo design</a></h5>
                                        <p class="text-muted mb-4">Everyone realizes why a new
                                            common language refuse to pay expensive translators.</p>

                                        <div>
                                            <a href="javascript: void(0);">
                                                <div
                                                    class="avatar-sm font-weight-bold d-inline-block m-1">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-success text-success">
                                                        D
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">

                                        <div>
                                            <div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> 13
                                                            Oct
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Tasks">
                                                            <i class="uil uil-bars mr-1"></i> 64
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments">
                                                            <i
                                                                class="uil uil-comments-alt mr-1"></i>
                                                            173
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pt-2">
                                                <div class="progress" style="height: 5px;"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="100% completed">
                                                    <div class="progress-bar bg-success"
                                                        role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-4 col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="badge badge-success float-right">Completed</div>
                                        <p class="text-success text-uppercase font-size-12 mb-2">Web
                                            Design</p>
                                        <h5><a href="#" class="text-dark">Website Redesign</a></h5>
                                        <p class="text-muted mb-4">The languages only differ in
                                            their grammar pronunciation and their most common words.
                                        </p>

                                        <div>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-9.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img src="/images/users/avatar-10.jpg" alt=""
                                                    class="avatar-sm m-1 rounded-circle">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div>
                                            <div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> 11
                                                            Oct
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Tasks">
                                                            <i class="uil uil-bars mr-1"></i> 71
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="text-muted d-inline-block"
                                                            data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments">
                                                            <i
                                                                class="uil uil-comments-alt mr-1"></i>
                                                            163
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pt-2">
                                                <div class="progress" style="height: 5px;"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="100% completed">
                                                    <div class="progress-bar bg-success"
                                                        role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->
                    </div>

                    <div class="tab-pane fade" id="pills-tasks" role="tabpanel"
                        aria-labelledby="pills-tasks-tab">
                        <h5 class="mt-3">Tasks</h5>

                        <div class="card mb-0 shadow-none">
                            <div class="card-body">
                                <!-- task -->
                                <div class="row justify-content-sm-between border-bottom">
                                    <div class="col-lg-6 mb-2 mb-lg-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="task1">
                                            <label class="custom-control-label" for="task1">
                                                Draft the new contract document for
                                                sales team
                                            </label>
                                        </div> <!-- end checkbox -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="d-sm-flex justify-content-between">
                                            <div>
                                                <img src="/images/users/avatar-9.jpg"
                                                    alt="image" class="avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Assigned to Arya S" />
                                            </div>
                                            <div class="mt-3 mt-sm-0">
                                                <ul class="list-inline font-13 text-sm-right">
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-schedule font-16 mr-1'></i>
                                                        Today 10am
                                                    </li>
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-align-alt font-16 mr-1'></i>
                                                        3/7
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <i
                                                            class='uil uil-comment-message font-16 mr-1'></i>
                                                        21
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge badge-soft-danger p-1">High</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end .d-flex-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task -->

                                <!-- task -->
                                <div class="row justify-content-sm-between mt-2 border-bottom pt-2">
                                    <div class="col-lg-6 mb-2 mb-lg-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="task2">
                                            <label class="custom-control-label" for="task2">
                                                iOS App home page
                                            </label>
                                        </div> <!-- end checkbox -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="d-sm-flex justify-content-between">
                                            <div>
                                                <img src="/images/users/avatar-2.jpg"
                                                    alt="image" class="avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Assigned to James B" />
                                            </div>
                                            <div class="mt-3 mt-sm-0">
                                                <ul class="list-inline font-13 text-sm-right">
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-schedule font-16 mr-1'></i>
                                                        Today 4pm
                                                    </li>
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-align-alt font-16 mr-1'></i>
                                                        2/7
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <i
                                                            class='uil uil-comment-message font-16 mr-1'></i>
                                                        48
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge badge-soft-danger p-1">High</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end .d-sm-flex-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task -->

                                <!-- task -->
                                <div
                                    class="row justify-content-sm-between mt-2 border-bottom pt-2 pb-3">
                                    <div class="col-lg-6 mb-2 mb-lg-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="task3">
                                            <label class="custom-control-label" for="task3">
                                                Write a release note
                                            </label>
                                        </div> <!-- end checkbox -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="d-sm-flex justify-content-between">
                                            <div>
                                                <img src="/images/users/avatar-4.jpg"
                                                    alt="image" class="avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Assigned to Kevin C" />
                                            </div>
                                            <div>
                                                <ul class="list-inline font-13 text-sm-right mb-0">
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-schedule font-16 mr-1'></i>
                                                        Today 6pm
                                                    </li>
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-align-alt font-16 mr-1'></i>
                                                        18/21
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <i
                                                            class='uil uil-comment-message font-16 mr-1'></i>
                                                        73
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge badge-soft-info p-1">Medium</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end .d-sm-flex-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task -->

                                <!-- task -->
                                <div class="row justify-content-sm-between border-bottom mt-2 pt-2">
                                    <div class="col-lg-6 mb-2 mb-lg-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="task4">
                                            <label class="custom-control-label" for="task4">
                                                Invite user to a project
                                            </label>
                                        </div> <!-- end checkbox -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="d-sm-flex justify-content-between">
                                            <div>
                                                <img src="/images/users/avatar-2.jpg"
                                                    alt="image" class="avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Assigned to James B" />
                                            </div>
                                            <div class="mt-3 mt-sm-0">
                                                <ul class="list-inline font-13 text-sm-right">
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-schedule font-16 mr-1'></i>
                                                        Tomorrow
                                                        7am
                                                    </li>
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-align-alt font-16 mr-1'></i>
                                                        1/12
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <i
                                                            class='uil uil-comment-message font-16 mr-1'></i>
                                                        36
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge badge-soft-danger p-1">High</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end .d-sm-flex-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task -->

                                <!-- task -->
                                <div class="row justify-content-sm-between mt-2 pt-2 border-bottom">
                                    <div class="col-lg-6 mb-2 mb-lg-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="task5">
                                            <label class="custom-control-label" for="task5">
                                                Enable analytics tracking
                                            </label>
                                        </div> <!-- end checkbox -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="d-sm-flex justify-content-between">
                                            <div>
                                                <img src="/images/users/avatar-2.jpg"
                                                    alt="image" class="avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Assigned to James B" />
                                            </div>
                                            <div class="mt-3 mt-sm-0">
                                                <ul class="list-inline font-13 text-sm-right">
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-schedule font-16 mr-1'></i>
                                                        27 Aug
                                                        10am
                                                    </li>
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-align-alt font-16 mr-1'></i>
                                                        13/72
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <i
                                                            class='uil uil-comment-message font-16 mr-1'></i>
                                                        211
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge badge-soft-success p-1">Low</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end .d-sm-flex-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task -->

                                <!-- task -->
                                <div class="row justify-content-sm-between mt-2 pt-2">
                                    <div class="col-lg-6 mb-2 mb-lg-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="task6">
                                            <label class="custom-control-label" for="task6">
                                                Code HTML email template
                                            </label>
                                        </div> <!-- end checkbox -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="d-sm-flex justify-content-between">
                                            <div>
                                                <img src="/images/users/avatar-7.jpg"
                                                    alt="image" class="avatar-xs rounded-circle"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Assigned to Edward S" />
                                            </div>
                                            <div class="mt-3 mt-sm-0">
                                                <ul class="list-inline font-13 text-sm-right mb-0">
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-schedule font-16 mr-1'></i>
                                                        No Due
                                                        Date
                                                    </li>
                                                    <li class="list-inline-item pr-1">
                                                        <i
                                                            class='uil uil-align-alt font-16 mr-1'></i>
                                                        0/7
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <i
                                                            class='uil uil-comment-message font-16 mr-1'></i>
                                                        0
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge badge-soft-info p-1">Medium</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end .d-sm-flex-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task -->
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