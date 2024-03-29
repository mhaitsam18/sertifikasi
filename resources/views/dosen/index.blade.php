@extends('dosen.layouts.main')

@section('container')
<div class="row page-title align-items-center">
    <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0">Dashboard</h4>
    </div>
    <div class="col-sm-8 col-xl-6">
        {{-- <form class="form-inline float-sm-right mt-3 mt-sm-0">
            <div class="form-group mb-sm-0 mr-2">
                <input type="text" class="form-control" id="dash-daterange" style="min-width: 190px;" />
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Download
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                        <span>Email</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Print</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                        <span>Re-Generate</span>
                    </a>
                </div>
            </div>
        </form> --}}
    </div>
</div>

<!-- content -->
<div class="row">
    {{-- <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Keuntungan</span>
                        <h2 class="mb-0">$2189</h2>
                    </div>
                    <div class="align-self-center">
                        <div id="today-revenue-chart" class="apex-charts"></div>
                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 10.21%</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Peserta Aktif</span>
                        <h2 class="mb-0">{{ $jumlah_peserta }}</h2>
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-product-sold-chart" class="apex-charts"></div>
                        <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Sertifikasi</span>
                        <h2 class="mb-0">{{ $jumlah_sertifikasi }}</h2>
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-new-customer-chart" class="apex-charts"></div>
                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 25.16%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Pelatihan</span>
                        <h2 class="mb-0">{{ $jumlah_pelatihan }}</h2>
                    </div>
                    {{-- <div class="align-self-center">
                        <div id="today-new-visitors-chart" class="apex-charts"></div>
                        <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <h5 class="card-title header-title border-bottom p-3 mb-0">List Pelaksanaan Pelatihan & Sertifikasi</h5>
                <div class="table-responsive col-lg-12">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Acara</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Penyelenggara</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Lokasi</th>
                                @if (session()->get('role_dosen') == "kaprodi")
                                    <th scope="col">Status Kegiatan</th>
                                @else
                                    <th scope="col">Biaya</th>
                                @endif
                                <th scope="col">Kuota</th>
                                <th scope="col">Koordinator</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($list_acara->count())
                                @foreach ($list_acara as $acara)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $acara->nama }}</td>
                                        <td>{{ $acara->periode }}</td>
                                        <td>{{ $acara->nama_penyelenggara }}</td>
                                        <td>{{ $acara->kategoriAcara->kategori }}</td>
                                        <td>{{ Str::limit(strip_tags($acara->deskripsi), 200, '...') }}</td>
                                        <td>{{ $acara->lokasi }}</td>
                                        @if (session()->get('role_dosen') == "kaprodi")
                                            <td>{{ $acara->statusAcara->status }}</td>
                                        @else
                                            <td>Rp. {{ number_format($acara->biaya,2,',','.') }}</td>
                                        @endif
                                        <td>{{ $acara->kuota }}</td>
                                        <td>{{ $acara->koordinator->kode_dosen }}</td>
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
                <div class="row px-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="kelas" id="kelas" class="form-control pilih-kelas" id="pilih-kelas">
                                <option value="" selected disabled>Pilih Kelas</option>
                                @foreach ($data_kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="filter-kelas">
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
                                            <td>{{ $pelatihan->mahasiswa->kelas->kelas }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <!-- stats + charts -->
<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <h5 class="card-title header-title border-bottom p-3 mb-0">Overview</h5>
                <!-- stat 1 -->
                <div class="media px-3 py-4 border-bottom">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">121,000</h4>
                        <span class="text-muted">Total Visitors</span>
                    </div>
                    <i data-feather="users" class="align-self-center icon-dual icon-lg"></i>
                </div>

                <!-- stat 2 -->
                <div class="media px-3 py-4 border-bottom">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">21,000</h4>
                        <span class="text-muted">Total Product Views</span>
                    </div>
                    <i data-feather="image" class="align-self-center icon-dual icon-lg"></i>
                </div>

                <!-- stat 3 -->
                <div class="media px-3 py-4">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$21.5</h4>
                        <span class="text-muted">Revenue Per Visitor</span>
                    </div>
                    <i data-feather="shopping-bag" class="align-self-center icon-dual icon-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body pb-0">
                <ul class="nav card-nav float-right">
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="#">Today</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="#">7d</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">15d</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="#">1m</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="#">1y</a>
                    </li>
                </ul>
                <h5 class="card-title mb-0 header-title">Revenue</h5>

                <div id="revenue-chart" class="apex-charts mt-3" dir="ltr"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body pb-0">
                <h5 class="card-title header-title">Targets</h5>
                <div id="targets-chart" class="apex-charts mt-3" dir="ltr"></div>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<!-- products -->
<div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-0 mb-0 header-title">Sales By Category</h5>
                <div id="sales-by-category-chart" class="apex-charts mb-0 mt-4" dir="ltr"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-primary btn-sm float-right">
                    <i class='uil uil-export ml-1'></i> Export
                </a>
                <h5 class="card-title mt-0 mb-0 header-title">Recent Orders</h5>

                <div class="table-responsive mt-4">
                    <table class="table table-hover table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#98754</td>
                                <td>ASOS Ridley High</td>
                                <td>Otto B</td>
                                <td>$79.49</td>
                                <td><span class="badge badge-soft-warning py-1">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#98753</td>
                                <td>Marco Lightweight Shirt</td>
                                <td>Mark P</td>
                                <td>$125.49</td>
                                <td><span class="badge badge-soft-success py-1">Delivered</span>
                                </td>
                            </tr>
                            <tr>
                                <td>#98752</td>
                                <td>Half Sleeve Shirt</td>
                                <td>Dave B</td>
                                <td>$35.49</td>
                                <td><span class="badge badge-soft-danger py-1">Declined</span>
                                </td>
                            </tr>
                            <tr>
                                <td>#98751</td>
                                <td>Lightweight Jacket</td>
                                <td>Shreyu N</td>
                                <td>$49.49</td>
                                <td><span class="badge badge-soft-success py-1">Delivered</span>
                                </td>
                            </tr>
                            <tr>
                                <td>#98750</td>
                                <td>Marco Shoes</td>
                                <td>Rik N</td>
                                <td>$69.49</td>
                                <td><span class="badge badge-soft-danger py-1">Declined</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row -->

<!-- widgets -->
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body pt-2">
                <h5 class="mb-4 header-title">Top Performers</h5>
                <div class="media border-top pt-3">
                    <img src="/images/users/avatar-7.jpg" class="avatar rounded mr-3" alt="shreyu">
                    <div class="media-body">
                        <h6 class="mt-1 mb-0 font-size-15">Shreyu N</h6>
                        <h6 class="text-muted font-weight-normal mt-1 mb-3">Senior Sales Guy</h6>
                    </div>
                    <div class="dropdown align-self-center float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-edit-alt mr-2"></i>Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-exit mr-2"></i>Remove from Team</a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
                <div class="media mt-1 border-top pt-3">
                    <img src="/images/users/avatar-9.jpg" class="avatar rounded mr-3" alt="shreyu">
                    <div class="media-body">
                        <h6 class="mt-1 mb-0 font-size-15">Greeva Y</h6>
                        <h6 class="text-muted font-weight-normal mt-1 mb-3">Social Media Campaign</h6>
                    </div>
                    <div class="dropdown align-self-center float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-edit-alt mr-2"></i>Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-exit mr-2"></i>Remove from Team</a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
                <div class="media mt-1 border-top pt-3">
                    <img src="/images/users/avatar-4.jpg" class="avatar rounded mr-3" alt="shreyu">
                    <div class="media-body">
                        <h6 class="mt-1 mb-0 font-size-15">Nik G</h6>
                        <h6 class="text-muted font-weight-normal mt-1 mb-3">Inventory Manager</h6>
                    </div>
                    <div class="dropdown align-self-center float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-edit-alt mr-2"></i>Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-exit mr-2"></i>Remove from Team</a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
                <div class="media mt-1 border-top pt-3">
                    <img src="/images/users/avatar-1.jpg" class="avatar rounded mr-3" alt="shreyu">
                    <div class="media-body">
                        <h6 class="mt-1 mb-0 font-size-15">Hardik G</h6>
                        <h6 class="text-muted font-weight-normal mt-1 mb-3">Sales Person</h6>
                    </div>
                    <div class="dropdown align-self-center float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-edit-alt mr-2"></i>Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-exit mr-2"></i>Remove from Team</a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                </div>

                <div class="media mt-1 border-top pt-3">
                    <img src="/images/users/avatar-5.jpg" class="avatar rounded mr-3" alt="shreyu">
                    <div class="media-body">
                        <h6 class="mt-1 mb-0 font-size-15">Stive K</h6>
                        <h6 class="text-muted font-weight-normal mt-1 mb-1">Sales Person</h6>
                    </div>
                    <div class="dropdown align-self-center float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-edit-alt mr-2"></i>Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-exit mr-2"></i>Remove from Team</a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body pt-2 pb-3">
                <a href="task-list.html" class="btn btn-primary btn-sm mt-2 float-right">
                    View All
                </a>
                <h5 class="mb-4 header-title">Tasks</h5>
                <div class="slimscroll" style="max-height: 390px;">
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task1">
                                <label class="custom-control-label" for="task1">
                                    Draft the new contract document for
                                    sales team
                                </label>
                                <p class="font-size-13 text-muted">Due on 24 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task2">
                                <label class="custom-control-label" for="task2">
                                    iOS App home page
                                </label>
                                <p class="font-size-13 text-muted">Due on 23 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task3">
                                <label class="custom-control-label" for="task3">
                                    Write a release note for Shreyu
                                </label>
                                <p class="font-size-13 text-muted">Due on 22 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task4">
                                <label class="custom-control-label" for="task4">
                                    Invite Greeva to a project shreyu admin
                                </label>
                                <p class="font-size-13 text-muted">Due on 21 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task5">
                                <label class="custom-control-label" for="task5">
                                    Enable analytics tracking for main website
                                </label>
                                <p class="font-size-13 text-muted">Due on 20 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task6">
                                <label class="custom-control-label" for="task6">
                                    Invite user to a project
                                </label>
                                <p class="font-size-13 text-muted">Due on 18 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="task7">
                                <label class="custom-control-label" for="task7">
                                    Write a release note
                                </label>
                                <p class="font-size-13 text-muted">Due on 14 Aug, 2019</p>
                            </div> <!-- end checkbox -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body pt-2">
                <div class="dropdown mt-2 float-right">
                    <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                        <i class="uil uil-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-refresh mr-2"></i>Refresh</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-user-plus mr-2"></i>Add Member</a>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="uil uil-exit mr-2"></i>Exit</a>
                    </div>
                </div>
                <h5 class="mb-4 header-title">Recent Conversation</h5>
                <div class="chat-conversation">
                    <ul class="conversation-list slimscroll" style="max-height: 328px;">
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="/images/users/avatar-9.jpg" alt="Female">
                                <i>10:00</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Greeva</i>
                                    <p>
                                        Hello!
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="/images/users/avatar-7.jpg" alt="Male">
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu</i>
                                    <p>
                                        Hi, How are you? What about our next meeting?
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="/images/users/avatar-9.jpg" alt="female">
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Greeva</i>
                                    <p>
                                        Yeah everything is fine
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="/images/users/avatar-7.jpg" alt="male">
                                <i>10:02</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu</i>
                                    <p>
                                        Awesome! let me know if we can talk in 20 min
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <form class="needs-validation" novalidate name="chat-form" id="chat-form">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control chat-input" placeholder="Enter your text" required>
                                <div class="invalid-feedback">
                                    Please enter your messsage
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-danger chat-send btn-block waves-effect waves-light">Send</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end .chat-conversation-->
            </div>
        </div>
    </div>
</div> --}}
<!-- end row -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.pilih-kelas').on('change', function() {
        const kelas_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/dosen/filter-kelas",
            type: 'post',
            data: {
                kelas_id: kelas_id
            },
            success: function(data) {
                $(".filter-kelas").html(data);
            }
        });
        
    });
</script>
    
@endsection