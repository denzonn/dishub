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
                <a href="{{ route('visi.index') }}" class="collapse-item">Visi & Misi</a>
                <a href="{{ route('job.index') }}" class="collapse-item">Tugas & Fungsi</a>
                <a href="{{ route('struktur.index') }}" class="collapse-item">Struktur Organisasi</a>
                <a href="{{ route('pejabat.index') }}" class="collapse-item">Pejabat Struktural</a>
                <a class="collapse-item" href={{ route('link-terkait.index') }}>Link Terkait</a>
                <a href="{{ route('admin-denah-kantor') }}" class="collapse-item">Denah Kantor</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
            aria-controls="collapseFive">
            <i class="fas fa-fw fa-cog"></i>
            <span>Program Kegiatan</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Master Data :</h6> --}}
                <a class="collapse-item" href="{{ route('news.index') }}">Berita Kegiatan</a>
                <a class="collapse-item" href="{{ route('gallery.index') }}">Galery</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('unit-kerja.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Unit Kerja</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('sakip.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Dokument & Publikasi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Masyarakat</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Master Data :</h6> --}}
                <a class="collapse-item" href="{{ route('admin-pengaduan.index') }}">Pengaduan</a>
                <a class="collapse-item" href="{{ route('admin-survey.index') }}">Survey</a>
            </div>
        </div>
    </li>

    @auth
        @if (Auth::user()->roles == 'SUPERADMIN')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-users') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Admin</span></a>
            </li>
        @endif
    @endauth

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
            aria-controls="collapseFour">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tautan</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Master Data :</h6> --}}
                <a class="collapse-item" href={{ route('admin-foto-beranda') }}>Foto Beranda</a>
                <a class="collapse-item" href={{ route('admin-tautan-menu') }}>Tautan Menu</a>
                <a class="collapse-item" href={{ route('admin-running-text') }}>Running Text</a>
                <a class="collapse-item" href={{ route('admin-media-sosial') }}>Media Sosial</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('mitra-kerja.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Mitra Kerja</span></a>
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
