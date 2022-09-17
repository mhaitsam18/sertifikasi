<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        {{-- <img src="/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" /> --}}
        <img src="{{ asset("storage/".auth()->user()->foto) }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ asset("storage/".auth()->user()->foto) }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ auth()->user()->nama }}</h6>
            <span class="pro-user-desc">Dosen</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="/dosen/profil" class="dropdown-item notify-item">
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
                <li>
                    <a href="/dosen">
                        <i data-feather="home"></i>
                        <span> Dahboard </span>
                    </a>
                </li>
                @can('koordinator')
                    <li class="menu-title">Koordinator</li>
                    <li>
                        <a href="/koordinator/acara">
                            <i data-feather="clipboard"></i>
                            <span> Master Pelatihan & Sertifikasi </span>
                        </a>
                    </li>
                @endcan

                @can('instruktur')
                    <li class="menu-title">Instruktur</li>
                    <li>
                        <a href="/instruktur">
                            <i data-feather="activity"></i>
                            <span> BAP Pelatihan & Sertifikasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/instruktur/histori">
                            <i data-feather="award"></i>
                            <span> Histori Pelatihan & Sertifikasi </span>
                        </a>
                    </li>                    
                @endcan
                @can('kaprodi')
                    <li class="menu-title">Kaprodi</li>
                    <li>
                        <a href="/kaprodi/pelatihan">
                            <i data-feather="info"></i>
                            <span> Info Pelatihan Terkini </span>
                        </a>
                    </li>
                    <li>
                        <a href="/kaprodi/sertifikasi">
                            <i data-feather="info"></i>
                            <span> Info Sertifikasi Terkini </span>
                        </a>
                    </li>
                    <li>
                        <a href="/kaprodi/histori">
                            <i data-feather="clock"></i>
                            <span> Histori Sertifikasi & Pelatihan </span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/kaprodi/master">
                            <i data-feather="clipboard"></i>
                            <span> Data Master Sertifikasi & Pelatihan </span>
                        </a>
                    </li> --}}
                @endcan
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