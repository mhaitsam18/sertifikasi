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
        @can('koordinator')
            <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>Koordinator</span>
            </h6>
            <ul  class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="percent"></span>
                        Master Pelatihan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="book-open"></span>
                        Master Sertifikasi
                    </a>
                </li>
            </ul>
        @endcan
        <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
            <span>Instruktur</span>
        </h6>
        <ul  class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                    <span data-feather="percent"></span>
                    BAP Pelatihan dan Sertifikasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                    <span data-feather="book-open"></span>
                    Master Sertifikasi
                </a>
            </li>
        </ul>
        @can('kaprodi')
            <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>Kaprodi</span>
            </h6>
            <ul  class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="percent"></span>
                        Info Pelatihan Terkini
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="book-open"></span>
                        Info Sertifikasi Terkini
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active': '' }}" href="/dashboard/categories">
                        <span data-feather="book-open"></span>
                        Histori Sertifikasi & Pelatihan
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>