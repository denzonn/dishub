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
                    class="nav-item dropdown {{ request()->is('visi-misi*', 'job*', 'kedudukan*', 'struktur*', 'pejabat*', 'pegawai*', 'unit-kerja*', 'denah*') ? 'active' : '' }}">
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
                            <a href="{{ route('denah') }}"
                                class="dropdown-item {{ request()->is('denah*') ? 'active' : '' }}">Denah Kantor</a>
                            <a href="{{ route('pejabat') }}"
                                class="dropdown-item {{ request()->is('pejabat*') ? 'active' : '' }}">Pejabat
                                Struktural</a>
                            <a href="{{ route('unit-kerja') }}"
                                class="dropdown-item {{ request()->is('unit-kerja*') ? 'active' : '' }}">Unit Kerja</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown {{ request()->is('news*', 'gallery*') ? 'active' : '' }}">
                    <div class="dropdown nav-link ">
                        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Program Kegiatan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="{{ route('news') }}"
                                class="dropdown-item {{ request()->is('news*') ? 'active' : '' }}">Berita Kegiatan</a>
                            <a href="{{ route('gallery') }}"
                                class="dropdown-item {{ request()->is('gallery*') ? 'active' : '' }}">Gallery</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown {{ request()->is('pengaduan*', 'form-survey*') ? 'active' : '' }}">
                    <div class="dropdown nav-link ">
                        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Masyarakat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="{{ route('pengaduan.index') }}"
                                class="dropdown-item {{ request()->is('pengaduan.index*') ? 'active' : '' }}">Pengaduan
                                Masyarakat</a>
                            <a href="{{ route('form-survey') }}"
                                class="dropdown-item {{ request()->is('form-survey*') ? 'active' : '' }}">Survey
                                Masyarakat</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sakip*') ? 'active' : '' }}"
                        href="{{ route('sakip') }}">Dokument & Publikasi</a>
                </li>
                @php
                    $tautan = App\Models\Tautan::all();
                @endphp
                @foreach ($tautan as $item)
                    <li class="nav-item dropdown {{ request()->is() ? 'active' : '' }}">
                        <div class="dropdown nav-link ">
                            <a class="dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Tautan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                <a href="{{ $item->link_tautan }}"
                                    class="dropdown-item {{ request()->is() ? 'active' : '' }}">{{ $item->nama_tautan }}</a>
                            </div>
                        </div>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sakip*') ? 'active' : '' }}"
                        href="{{ route('mitra-kerja') }}">Mitra Kerja</a>
                </li>

                {{-- Jika sdh auth maka tidak usah tampilkan --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
