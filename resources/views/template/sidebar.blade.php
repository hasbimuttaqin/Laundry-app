<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('image/logo.png') }}" width="60px" height="60px">
        </div>
        <div class="sidebar-brand-text mx-3">Abroor Laundry</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

@if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir' || Auth::user()->role == 'owner')
<li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
@endif


@if (Auth::user()->role == 'admin')
<li class="nav-item">
    <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-user"></i>
        <span>Data User</span></a>
</li>
@endif


@if (Auth::user()->role == 'kasir')
<li class="nav-item">
    <a class="nav-link" href="{{ route('registerpelanggan') }}">
        <i class="fas fa-fw fa-user-plus"></i>
        <span>Registrasi Pelanggan</span></a>
</li>
@endif


@if (Auth::user()->role == 'admin')
       <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Master Data</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('pelanggan') }}"><i class="fas fa-fw fa-user"></i> Pelanggan</a>
            <a class="collapse-item" href="{{ route('outlet') }}"><i class="fas fa-fw fa-store"></i> Outlet</a>
            <a class="collapse-item" href="{{ route('paket') }}"><i class="fas fa-fw fa-cube"></i> Paket</a>
        </div>
    </div>
</li>
@endif


@if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
<li class="nav-item">
    <a class="nav-link" href="{{ route('transaksi') }}">
        <i class="fas fa-fw fa-handshake"></i>
        <span>Transaksi</span></a>
</li>
@endif


@if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir' || Auth::user()->role == 'owner')
<li class="nav-item ">
    <a class="nav-link" href="{{ route('laporan') }}">
        <i class="fas fa-fw fa-file"></i>
        <span>Laporan</span></a>
</li>
@endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
