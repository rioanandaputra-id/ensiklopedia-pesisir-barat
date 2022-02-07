<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('backend') }}" class="brand-link">
        <img src="{{ asset('assets/Frontend/img/acc.png') }}" alt="AdminLTE Logo" class="brand-image p-1 mt-1">
        <span class="brand-text font-weight" style="font-size: 17px;"><strong>ENSIKLOPEDIA PESBAR</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image mt-1">
                <img src="{{ asset('assets/Backend/dist/img/user2-160x160.jpg') }}" class="mt-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('backend/profile') }}" class="d-block">Tambat Ramdhani</a>
                <span class="d-block text-sm">Administrator</span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('backend') }}" class="nav-link {{ request()->is('backend') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->is('backend/master/*') || request()->is('backend/master*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('backend/master/*') || request()->is('backend/master*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('backend/master/user') }}"
                                class="nav-link {{ request()->is('backend/master/user') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengguna Sistem</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('backend/master/category_article') }}"
                                class="nav-link {{ request()->is('backend/master/category_article') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('backend/master/index_article') }}"
                                class="nav-link {{ request()->is('backend/master/index_article') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Indek Artikel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('backend/article/*') || request()->is('backend/article*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('backend/article/*') || request()->is('backend/article*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Artikel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('backend/article?status=terbit') }}"
                                class="nav-link {{ request('status') == 'terbit' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terbit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('backend/article?status=tunggu') }}"
                                class="nav-link {{ request('status') == 'tunggu' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tunggu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('backend/article?status=arsip') }}"
                                class="nav-link {{ request('status') == 'arsip' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Arsip</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('backend/gallery/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('backend/gallery/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Galleri
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->is('backend/gallery/photo*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('backend/gallery/photo*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Foto
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('backend/gallery/photo?status=terbit') }}"
                                        class="nav-link {{ request()->is('backend/gallery/photo')  && request('status') == 'terbit' ? 'active bg-secondary' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Terbit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('backend/gallery/photo?status=tunggu') }}"
                                        class="nav-link {{ request()->is('backend/gallery/photo') && request('status') == 'tunggu' ? 'active bg-secondary' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Tunggu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('backend/gallery/photo?status=arsip') }}"
                                        class="nav-link {{ request()->is('backend/gallery/photo') && request('status') == 'arsip' ? 'active bg-secondary' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Arsip</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->is('backend/gallery/video*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('backend/gallery/video*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Video
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('backend/gallery/video?status=terbit') }}"
                                        class="nav-link {{ request()->is('backend/gallery/video') && request('status') == 'terbit' ? 'active bg-secondary' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Terbit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('backend/gallery/video?status=tunggu') }}"
                                        class="nav-link {{ request()->is('backend/gallery/video') && request('status') == 'tunggu' ? 'active bg-secondary' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Tunggu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('backend/gallery/video?status=arsip') }}"
                                        class="nav-link {{ request()->is('backend/gallery/video') && request('status') == 'arsip' ? 'active bg-secondary' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Arsip</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('backend/profile') }}"
                        class="nav-link {{ request()->is('backend/profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profil Saya
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('auth/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Tentang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('auth/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
