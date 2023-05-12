@extends('layouts.admin')

@section('title')
    Tambah Gallery
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
                    <h1 class="h3 mb-2 text-gray-800">Silahkan Masukkan Foto Kegiatan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 w-75">
                        <div class="card-body">
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <label>Judul Kegiatan</label>
                                <input name="judul_kegiatan" type="text" class="form-control mb-4"
                                    value="{{ $gallery->judul_kegiatan }}" required>
                                <img src="{{ Storage::url($gallery->photo_kegiatan) }}" alt="" style="width: 100px">
                                <input name="photo_kegiatan" type="file">
                                <button class="btn btn-primary w-100 mt-5" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
