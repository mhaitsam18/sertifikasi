<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        {{-- <img src="/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" /> --}}
        <img src="{{ asset("storage/".auth()->user()->foto) }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ asset("storage/".auth()->user()->foto) }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ auth()->user()->nama }}</h6>
            <span class="pro-user-desc">Mahasiswa</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
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
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Mahasiswa</li>

                <li>
                    <a href="/mahasiswa">
                        <i data-feather="home"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Home </span>
                    </a>
                </li>                
                <li>
                    <a href="/mahasiswa/acara/diikuti">
                        <i data-feather="home"></i>
                        <span> Acara yang Sedang diikuti </span>
                    </a>
                </li>
                <li>
                    <a href="/peserta/invoice">
                        <i data-feather="file-text"></i>
                        <span> Data Tagihan </span>
                    </a>
                </li>
                <li>
                    <a href="/peserta/pembayaran">
                        <i data-feather="credit-card"></i>
                        <span> List Pembayaran </span>
                    </a>
                </li>
                <li>
                    <a href="/peserta/histori">
                        <i data-feather="clock"></i>
                        <span> Histori Sertifikasi & Pelatihan</span>
                    </a>
                </li>

                <li class="menu-title">Pelatihan, Sertifikasi dan Berita</li>
                <li>
                    <a href="/mahasiswa/pelatihan">
                        <i data-feather="activity"></i>
                        <span> Pelatihan </span>
                    </a>
                </li>
                <li>
                    <a href="/mahasiswa/sertifikasi">
                        <i data-feather="award"></i>
                        <span> Sertifikasi </span>
                    </a>
                </li>
                <li>
                    <a href="/mahasiswa/berita">
                        <i data-feather="file-text"></i>
                        <span> Berita </span>
                    </a>
                </li>
                <li class="menu-title">Lainnya</li>
                <li>
                    <a href="/calendar">
                        <i data-feather="calendar"></i>
                        <span> Kalender </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);">
                        <i data-feather="inbox"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="email-inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="email-read.html">Read</a>
                        </li>
                        <li>
                            <a href="email-compose.html">Compose</a>
                        </li>
                    </ul>
                </li> --}}
                
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->