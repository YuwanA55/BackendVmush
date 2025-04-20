<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <br>
    <li class="menu-item {{ Request::is('dashboard/admin') ? 'active' : '' }}">
        <a href="/dashboard/admin" class="menu-link ">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
        </a>
    </li>
    <br>
    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Data User &amp; Kopi</span>
    </li>

    {{-- akun --}}
    <li class="mb-2 menu-item {{ Request::is('dashboard/admin/akun/*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div data-i18n="Data Pengguna">Data Pengguna</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('dashboard/admin/akun/user*') ? 'active' : '' }}">
                <a href="/dashboard/admin/akun/user" class="menu-link">
                    <div data-i18n="Data User">Data User</div>
                </a>
            </li>
        </ul>

        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('dashboard/admin/akun/mitra*') ? 'active' : '' }}">
                <a href="/dashboard/admin/akun/mitra" class="menu-link">
                    <div data-i18n="Data Mitra">Data Mitra</div>
                </a>
            </li>
        </ul>

        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('dashboard/admin/akun/Tengkulak*') ? 'active' : '' }}">
                <a href="/dashboard/admin/akun/Tengkulak" class="menu-link">
                    <div data-i18n="Data Tengkulak">Data Tengkulak</div>
                </a>
            </li>
        </ul>

    </li>

    {{-- Firebase --}}
    <li class="mb-2 menu-item {{ Request::is('dashboard/admin/DataLink/*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-link"></i>
            <div data-i18n="Link Firebase">Link Firebase</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('dashboard/admin/DataLink/Firebase*') ? 'active' : '' }}">
                <a href="/dashboard/admin/DataLink/Firebase" class="menu-link">
                    <div data-i18n="Data Firebase">Data Firebase</div>
                </a>
            </li>
        </ul>
    </li>

        {{-- Firebase --}}
        <li class="mb-2 menu-item {{ Request::is('dashboard/admin/Produk*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-rocket"></i>
                <div data-i18n="Produk">Produk</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dashboard/admin/Produk/Paket*') ? 'active' : '' }}">
                    <a href="/dashboard/admin/Produk/Paket" class="menu-link">
                        <div data-i18n="Data Paket">Data Paket</div>
                    </a>
                </li>
            </ul>
        </li>

                {{-- Firebase --}}
                <li class="mb-2 menu-item {{ Request::is('dashboard/admin/Pembelian*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                        <div data-i18n="Pembelian">Pembelian</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ Request::is('dashboard/admin/Pembelian/Paket*') ? 'active' : '' }}">
                            <a href="/dashboard/admin/Pembelian/Paket" class="menu-link">
                                <div data-i18n="Pembelian Paket">Pembelian Paket</div>
                            </a>
                        </li>
                    </ul>
                </li>
    
    

  

</ul>
{{-- <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Data Tambahan</span>
    </li>

<li class="mb-2 menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-news"></i>
            <div data-i18n="Data Artikel">Data Artikel</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="../dataartikel/artikel.php" class="menu-link">
                    <div data-i18n="Data Artikel">Data Artikel</div>
                </a>
            </li>
        </ul>
    </li> --}}



