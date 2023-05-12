<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
        <div class="first">
            <img src="{{ asset('frontend/img/logoperhubungan.png') }}" alt="" class="logo">
            <img src="{{ asset('frontend/img/logosulsel.png') }}" alt="" class="logo">
            <a href="{{ route('home') }}" class="navbar-brand">
                <div class="row ">
                    <span style="color: white">Dinas Perhubungan</span>
                    <span class="text-primary">Provinsi Sulawesi Selatan</span>
                </div>
            </a>
        </div>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li
                    class="nav-item dropdown {{ request()->is('visi-misi*', 'job*', 'kedudukan*', 'struktur*', 'pejabat*', 'pegawai*') ? 'active' : '' }}">
                    <div class="dropdown nav-link ">
                        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="{{ route('visi-misi') }}"
                                class="dropdown-item {{ request()->is('visi-misi*') ? 'active' : '' }}">Visi & Misi</a>
                            <a href="{{ route('job') }}"
                                class="dropdown-item {{ request()->is('job*') ? 'active' : '' }}">Tugas & Fungsi</a>
                            <a href="{{ route('kedudukan') }}"
                                class="dropdown-item {{ request()->is('kedudukan*') ? 'active' : '' }}">Kedudukan &
                                Alamat</a>
                            <a href="{{ route('struktur') }}"
                                class="dropdown-item {{ request()->is('struktur*') ? 'active' : '' }}">Struktur
                                Organisasi</a>
                            <a href="{{ route('pejabat') }}"
                                class="dropdown-item {{ request()->is('pejabat*') ? 'active' : '' }}">Pejabat
                                Struktural</a>
                            <a class="dropdown-item {{ request()->is('pegawai*') ? 'active' : '' }}">Pegawai</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('news*') && !request()->is('/') ? 'active' : '' }}"
                        href="{{ route('news') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sakip*') ? 'active' : '' }}"
                        href="{{ route('sakip') }}">Sakip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}"
                        href="{{ route('gallery') }}">Gallery</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
