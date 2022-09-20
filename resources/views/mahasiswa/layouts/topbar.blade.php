@php
    use App\Models\Notifikasi;
@endphp
<!-- Topbar Start -->
<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="/" class="navbar-brand mr-0 mr-md-2 logo">
            <span class="logo-lg">
                <img src="/images/logo.png" alt="" height="24" />
                <span class="d-inline h5 ml-1 text-logo">Sertifikasi</span>
            </span>
            <span class="logo-sm">
                <img src="/images/logo.png" alt="" height="24">
            </span>
        </a>

        <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile open-left disable-btn">
                    <i data-feather="menu" class="menu-icon"></i>
                    <i data-feather="x" class="close-icon"></i>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-sm-block">
                <div class="app-search">
                    <form action="/mahasiswa/acara" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Event">
                            <span data-feather="search"></span>
                        </div>
                    </form>
                </div>
            </li>

            {{-- <li class="dropdown d-none d-lg-block" data-toggle="tooltip" data-placement="left" title="Change language">
                <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i data-feather="globe"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </li> --}}

            @php
                $unread_notifikasi = Notifikasi::where('is_read', 0)->where(function($query) {
                    $query->where('user_id', auth()->user()->id)
                      ->orWhere('user_id', null);
                    })
                    ->whereIn('kategori_notifikasi_id', ['4','5','6'])
                ->get();
            @endphp
            <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="@if ($unread_notifikasi->count() > 0){{ $unread_notifikasi->count() }} Notifikasi Baru belum dibaca @else Notifikasi @endif">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i data-feather="bell"></i>
                    @if ($unread_notifikasi->count() > 0)
                        <span class="noti-icon-badge"></span>
                        
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title border-bottom">
                        <h5 class="m-0 font-size-16">
                            <span class="float-right">
                                <a href="#" class="text-dark clear-notification">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll" id="show-notifikasi">

                        @php
                            $data_notifikasi = Notifikasi::where(function($query) {
                                $query->where('user_id', auth()->user()->id)
                                ->orWhere('user_id', null);
                            })
                            ->whereIn('kategori_notifikasi_id', ['4','5','6'])
                            ->get();
                        @endphp
                        @foreach ($data_notifikasi as $notifikasi)
                            <!-- item-->
                            <a href="/mahasiswa/notifikasi/{{ $notifikasi->id }}" class="dropdown-item notify-item border-bottom @if($notifikasi->is_read == 0) font-weight-bold @endif">
                                @switch($notifikasi->kategori_notifikasi_id)
                                    @case(4)
                                    <div class="notify-icon bg-info"><i class="uil   uil-user-check"></i></div>
                                    @break
                                    @case(5)
                                    <div class="notify-icon bg-success"><i class="uil uil-file-check-alt"></i></div>
                                    @break
                                    @case(6)
                                    <div class="notify-icon bg-warning"><i class="uil uil-newspaper"></i></div>
                                        @break
                                    @default
                                        
                                @endswitch
                                <p class="notify-details">{{ $notifikasi->subjek .': '.$notifikasi->pesan }}<small class="text-muted">{{ $notifikasi->created_at->diffForHumans() }}</small>
                                </p>
                            </a>                            
                        @endforeach

                        
                    </div>

                    <!-- All-->
                    <a href="/mahasiswa/notifikasi" class="dropdown-item text-center text-primary notify-item notify-all border-top">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            {{-- <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="Settings">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                    <i data-feather="settings"></i>
                </a>
            </li> --}}

            <li class="dropdown notification-list align-self-center profile-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <div class="media user-profile ">
                        <img src="/images/users/avatar-7.jpg" alt="user-image" class="rounded-circle align-self-center" />
                        <div class="media-body text-left">
                            <h6 class="pro-user-name ml-2 my-0">
                                <span>Sertifikasi</span>
                                <span class="pro-user-desc text-muted d-block mt-1">Mahasiswa </span>
                            </h6>
                        </div>
                        <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                    </div>
                </a>
                <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                    <a href="/mahasiswa/profil" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                        <span>My Account</span>
                    </a>

                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                        <span>Settings</span>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                        <span>Support</span>
                    </a>

                    <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                        <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                        <span>Lock Screen</span>
                    </a> --}}

                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item notify-item">
                            <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>

</div>
<!-- end Topbar -->