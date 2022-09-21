
        <!--APP-SIDEBAR-->
        <div class="sticky">
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="app-sidebar">
                <div class="side-header">
                    <a class="header-brand1" href="/">
                        <img src="/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                        <img src="/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                        <img src="/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                        <img src="/assets/images/brand/logo-4.png?1" class="header-brand-img light-logo1" alt="logo">
                    </a>
                    <!-- LOGO -->
                </div>
                <div class="main-sidemenu">
                    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                    <ul class="side-menu">
                        <li class="sub-category">
                            <h3>Modul Utama</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{!! url('/'); !!}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{!! url('/category'); !!}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Category</span></a>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{!! url('/course'); !!}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Course</span></a>
                        </li>


                        @if (getPermissions('modul_pengguna')['checked'])
                        <li class="sub-category">
                            <h3>Modul Pengguna</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">User</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                              @if (getPermissions('profile')['checked'])
                              <li><a href="{!! url('/profile'); !!}" class="slide-item"> Profil User</a></li>
                              @endif
                              @if (getPermissions('change_password')['checked'])
                              <li><a href="{!! url('/change_password'); !!}" class="slide-item"> Ganti Password</a></li>
                              @endif
                              @if (getPermissions('hak_akses')['checked'])
                              <li><a href="{!! url('/position'); !!}" class="slide-item"> Hak Akses</a></li>
                              @endif
                              @if (getPermissions('user')['checked'])
                              <li><a href="{!! url('/user'); !!}" class="slide-item"> User</a></li>
                              @endif
                            </ul>
                        </li>
                        @endif


                        @if (getPermissions('config')['checked'])
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="/config">
                              <i class="side-menu__icon fe fe-settings"></i>
                              <span class="side-menu__label">Konfigurasi</span>
                            </a>
                        </li>
                        @endif
                        @if (getPermissions('audit_trail')['checked'])
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="/audit_trail">
                              <i class="side-menu__icon fe fe-book"></i>
                              <span class="side-menu__label">Audit Trail</span>
                            </a>
                        </li>
                        @endif
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="/logout">
                              <i class="side-menu__icon fe fe-log-out"></i>
                              <span class="side-menu__label">Logout</span>
                            </a>
                        </li>
                      </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->
        </div>
