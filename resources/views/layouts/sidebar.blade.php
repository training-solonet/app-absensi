<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img style="width: 175px; height: 55px;" src="{{ asset('assets/img/logo.png') }} ">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1 overflow-auto">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
              <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Tables</span></li>
            <!-- Tables -->
            <li class="menu-item {{ request()->is('siswa') ? 'active' : '' }}">
              <a href="/siswa" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Data Siswa</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('absensi') ? 'active' : '' }}">
              <a href="/absensi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Laporan Absensi  </div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('uid') ? 'active' : '' }}">
              <a href="/uid" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Data UID</div>
              </a>
            </li>
          </ul>
        </aside>