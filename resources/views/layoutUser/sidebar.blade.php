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
        <div data-i18n="Adds On">Adds On</div>
        {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
    </a>
</li>

<div class="mt-1"></div>

<li class="menu-item {{ Request::is('dashboard/user/*/HistoryPenyewaan*') ? 'active' : '' }}">
    <a href="/dashboard/user/{{session('username')}}/HistoryPenyewaan" class="menu-link ">
        <i class="menu-icon tf-icons ti ti-star"></i>
        <div data-i18n="History Penyewaan">History Penyewaan</div>
        {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
    </a>
</li>

<div class="mt-1"></div>

<li class="menu-item {{ Request::is('dashboard/user/permintaanstok*') ? 'active' : '' }}">
    <a href="/dashboard/user/permintaanstok" class="menu-link ">
        <i class="menu-icon tf-icons ti ti-package"></i>
        <div data-i18n="Permintaan Stok">Permintaan Stok</div>
        {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
    </a>
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



