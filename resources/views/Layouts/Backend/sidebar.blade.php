<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('backend')}}" class="brand-link">
      <img src="{{ asset('assets/Frontend/img/acc.png') }}" alt="AdminLTE Logo" class="brand-image p-1 mt-1" >
      <span class="brand-text font-weight" style="font-size: 17px;"><strong>ENSIKLOPEDIA PESBAR</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <div class="image mt-1">
          <img src="{{ asset('assets/Backend/dist/img/user2-160x160.jpg') }}" class="mt-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('backend/profile')}}" class="d-block">Tambat Ramdhani</a>
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('backend')}}" class="nav-link {{ (request()->is('backend')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('backend/category_article') || request()->is('backend/index_article') || request()->is('backend/page_web')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('backend/category_article') || request()->is('backend/index_article') || request()->is('backend/page_web')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('backend/category_article')}}" class="nav-link {{ (request()->is('backend/category_article')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Artikel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('backend/index_article')}}" class="nav-link {{ (request()->is('backend/index_article')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Indek Artikel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('backend/page_web')}}" class="nav-link {{ (request()->is('backend/page_web')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Halaman Web</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item {{ (request()->is('backend/article/*') || request()->is('backend/article*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('backend/article/*') || request()->is('backend/article*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Artikel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('backend/article?page=terbit')}}" class="nav-link {{ (request()->is('backend/article?page=terbit')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terbit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('backend/article?page=tunggu')}}" class="nav-link {{ (request()->is('backend/article?page=tunggu')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tunggu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('backend/article?page=arsip')}}" class="nav-link {{ (request()->is('backend/article?page=arsip')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Arsip</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('backend/user')}}" class="nav-link {{ (request()->is('backend/user')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('backend/photo') || request()->is('backend/index_article') || request()->is('backend/video')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('backend/photo') || request()->is('backend/index_article') || request()->is('backend/video')) ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Galleri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('backend/photo')}}" class="nav-link {{ (request()->is('backend/photo')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Foto</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('backend/video')}}" class="nav-link {{ (request()->is('backend/video')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Video</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('backend/profile')}}" class="nav-link {{ (request()->is('backend/profile')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil Saya
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('auth/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
