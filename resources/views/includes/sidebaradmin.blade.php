<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-0" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('frontend/img/logoperhubungan.png') }}" alt="" style="width: 30px;">
        </div>
        <div class="sidebar-brand-text mx-3">Dishub<sup>Sulsel</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin-dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profil</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Profil :</h6>
                <a href="{{ route('visi.index') }}" class="collapse-item" href="buttons.html">Visi & Misi</a>
                <a href="{{ route('job.index') }}" class="collapse-item" href="cards.html">Tugas & Fungsi</a>
                <a href="{{ route('struktur.index') }}" class="collapse-item" href="cards.html">Struktur Organisasi</a>
                <a href="{{ route('pejabat.index') }}" class="collapse-item" href="cards.html">Pejabat Struktural</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Berita</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('sakip.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sakip</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Galery</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin-pengaduan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengaduan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin-survey.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Survey</span></a>
    </li>

    <li class="nav-item">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i
                class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>
<!-- End of Sidebar -->
