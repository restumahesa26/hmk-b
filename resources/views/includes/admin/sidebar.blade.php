<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-folder"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Database HMK-B</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Anggota
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('data-anggota-aktif.index') }}">
            <i class="fas fa-database"></i>
            <span>Data Anggota Aktif</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('data-alumni.index') }}">
            <i class="fas fa-database"></i>
            <span>Data Alumni</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('request-data.index') }}">
            <i class="fas fa-database"></i>
            <span>Request Data</span>
        </a>
    </li>

    <div class="sidebar-heading">
        Data Lainnya
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('kampus.index') }}">
            <i class="fas fa-database"></i>
            <span>Daftar Kampus</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('tentang-hmkb.index') }}">
            <i class="fas fa-database"></i>
            <span>Tentang HMK-B</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('data-pengurus.index') }}">
            <i class="fas fa-database"></i>
            <span>Data Pengurus</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('data-divisi.index') }}">
            <i class="fas fa-database"></i>
            <span>Data Divisi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('data-dokumentasi.index') }}">
            <i class="fas fa-database"></i>
            <span>Data Dokumentasi</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
