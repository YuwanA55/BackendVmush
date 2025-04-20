<ul class="menu-inner py-1">
    <!-- Dashboards -->

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data User</span>
        </li>

    <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link ">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
        </a>
    </li>
<div class="mt-1"></div>

<li class="menu-item {{ Request::is('dashboard/user/upgrade*') ? 'active' : '' }}">
    <a href="/dashboard/user/upgrade" class="menu-link ">
        <i class="menu-icon tf-icons ti ti-star"></i>
        <div data-i18n="Langganan">Langganan</div>
        {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
    </a>
</li>

<div class="mt-1"></div>


<div class="mt-1"></div>


   

    
    

    {{-- <li class="menu-item {{ Request::is('data/*') ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon ti ti-box"></i>
        <div data-i18n="Data Produk">Data Produk</div>
    </a>
    <ul class="menu-sub">

        <li class="menu-item {{ Request::is('data/lahan') ? 'active' : '' }}">
            <a href="/data/lahan" class="menu-link">
                <div data-i18n="Data Lahan">Data Lahan</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('data/peremajaan') ? 'active' : '' }}">
            <a href="/data/peremajaan" class="menu-link">
                <div data-i18n="Data Peremajaan">Data Peremajaan</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('data/kopi') ? 'active' : '' }}">
            <a href="/data/kopi" class="menu-link">
                <div data-i18n="Data Kopi">Data Kopi</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('data/harga/kopi') ? 'active' : '' }}">
            <a href="/data/harga/kopi" class="menu-link">
                <div data-i18n="Data Harga Kopi">Data Harga Kopi</div>
            </a>
        </li>
    </ul>
</li> --}}

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



