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
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown nav-link">
                        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            {{-- <a href="{{ route('visi-misi') }}" class="dropdown-item">Visi & Misi</a> --}}
                            {{-- <a href="{{ route('job') }}" class="dropdown-item">Tugas & Fungsi</a>
                            <a href="{{ route('kedudukan') }}" class="dropdown-item">Kedudukan & Alamat</a>
                            <a href="{{ route('struktur') }}" class="dropdown-item">Struktur Organisasi</a>
                            <a href="{{ route('pejabat') }}" class="dropdown-item">Pejabat Struktural</a> --}}
                            <a class="dropdown-item">Pegawai</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news') }}">Berita</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('sakip') }}">Sakip</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
