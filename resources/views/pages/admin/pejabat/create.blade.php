@extends('layouts.admin')

@section('title')
    Tambah Berita
@endsection

@section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        @include('includes.sidebaradmin')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a href="{{ route('news.index') }}">
                        <i class="fa-solid fa-arrow-left" style="text-decoration: none"></i>
                    </a>
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Silahkan Input Pejabat</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 w-75">
                        <div class="card-body">
                            <form action="{{ route('pejabat.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <label>Nama Pejabat</label>
                                <input type="text" class="form-control mb-4" name="nama_pejabat" required>
                                <label>NIP Pejabat</label>
                                <input type="number" class="form-control mb-4" name="nip_pejabat" required>
                                <label>Jabatan Pejabat</label>
                                <select name="jabatan_id" class="form-control">
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                    @endforeach
                                </select>
                                <input type="file" class="mt-5" name="photo_pejabat" required>
                                <button class="btn btn-primary w-100 mt-5" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
