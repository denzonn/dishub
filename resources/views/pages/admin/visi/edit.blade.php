@extends('layouts.admin')

@section('title')
    Edit Visi Misi
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
                    <h1 class="h3 mb-2 text-gray-800">Silahkan Masukkan Visi & Misi</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 w-75">
                        <div class="card-body">
                            <form action="{{ route('visi.update', $visi->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <label>Visi & Misi</label>
                                <textarea name="visi" cols="30" rows="10" id="editor">{!! $visi->visi !!}</textarea>
                                <img src="{{ Storage::url($visi->photo) }}" alt="" style="width: 100px">
                                <input name="photo" type="file" class="mt-3">
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
