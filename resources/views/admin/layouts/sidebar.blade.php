<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active': '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active': '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li> --}}
            
        </ul>
        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul  class="nav flex-column">
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="percent"></span>
                        Promosi Pelaksanaan Pelatihan
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="book-open"></span>
                        Ujian Sertifikasi
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/profil*') ? 'active': '' }}" href="/dashboard/profil">
                        <span data-feather="user"></span>
                        Profil Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/acara*') ? 'active': '' }}" href="/dashboard/acara">
                        <span data-feather="edit-3"></span>
                        Promosi/Validasi Pelatihan dan Sertifikasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/dosen*') ? 'active': '' }}" href="/dashboard/dosen">
                        <span data-feather="users"></span>
                        Data Dosen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/peserta*') ? 'active': '' }}" href="/dashboard/peserta">
                        <span data-feather="users"></span>
                        Data Peserta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/pembayaran*') ? 'active': '' }}" href="/dashboard/pembayaran">
                        <span data-feather="credit-card"></span>
                        Data Pembayaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/berita*') ? 'active': '' }}" href="/dashboard/berita">
                        <span data-feather="file-text"></span>
                        Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/sertifikat*') ? 'active': '' }}" href="/dashboard/sertifikat">
                        <span data-feather="edit"></span>
                        Pengambilan Sertifikat
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>