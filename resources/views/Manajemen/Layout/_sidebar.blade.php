<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#!" target="_blank">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Administrator</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white @menuActive('HalamanManajemenPort')" href="{{ route('HalamanManajemenPort') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen Port</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white @menuActive('ManajemenPerusahaan.*')"
                    href="{{ route('ManajemenPerusahaan.HalamanManajemenPerusahaan') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-list"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen Perusahaan</span>
                </a>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#manajemenPengguna" class="nav-link text-white @menuActiveCollapsed('ManajemenPengguna.*')"
                    aria-controls="manajemenPengguna" role="button" aria-expanded="false">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                </a>
                <div class="collapse @menuShow('ManajemenPengguna.*')" id="manajemenPengguna">
                    <ul class="nav ">
                        {{-- <li class="nav-item @menuActiveSub('ManajemenPengguna.HalamanRole')">
                            <a class="nav-link text-white @menuActiveSub('ManajemenPengguna.HalamanRole')"
                                href="{{ route('ManajemenPengguna.HalamanRole.Role') }}">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Role </span>
                            </a>
                        </li>
                        <li class="nav-item @menuActiveSub('ManajemenPengguna.HalamanPermission.*')">
                            <a class="nav-link text-white @menuActiveSub('ManajemenPengguna.HalamanPermission.*')"
                                href="{{ route('ManajemenPengguna.HalamanPermission.Permission') }}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Permission </span>
                            </a>
                        </li> --}}
                        <li class="nav-item @menuActiveSub('ManajemenPengguna.HalamanUser.*')">
                            <a class="nav-link text-white @menuActiveSub('ManajemenPengguna.HalamanUser.Role')"
                                href="{{ route('ManajemenPengguna.HalamanUser.Role') }}">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Role </span>
                            </a>
                        </li>
                        <li class="nav-item @menuActiveSub('ManajemenPengguna.HalamanUser.*')">
                            <a class="nav-link text-white @menuActiveSub('ManajemenPengguna.HalamanUser.User')"
                                href="{{ route('ManajemenPengguna.HalamanUser.User') }}">
                                <span class="sidenav-mini-icon"> U </span>
                                <span class="sidenav-normal  ms-2  ps-1"> User </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('ProsesLogout') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <span class="nav-link-text ms-1">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
