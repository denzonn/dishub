@extends('layouts.admin')

@section('title')
    Tambah Mitra
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
                    <a href="{{ route('mitra-kerja.index') }}">
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
                    <h1 class="h3 mb-2 text-gray-800"> Silahkan Input Mitra</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 w-75">
                        <div class="card-body">
                            <form action="{{ route('mitra-kerja.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <label> Judul</label>
                                <input type="text" class="form-control mb-4" name="judul" required>
                                <label> Deskripsi</label>
                                <textarea name="description" id="editor"></textarea>
                                <label class="mt-4 mb-0"> Foto</label>
                                <div>
                                    <input type="file" class="mt-4" name="photo" required>
                                </div>
                                <button class="btn btn-primary w-100 mt-5" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
