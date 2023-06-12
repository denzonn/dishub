@extends('layouts.admin')

@section('title')
    Survey Masyarakat
@endsection

@section('content')
    <!-- Page Wrapper -->
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
                    <h1 class="h3 mb-2 text-gray-800">Pertanyaan Survey (Bidang Penunjang Urusan Pemerintahan Umum)</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            {{-- Tambah Soal --}}
                            <form action="{{ route('admin-survey-penunjang.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="question-option">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label>List Pertanyaan</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="question-container col-12 px-0">
                                                    @forelse ($pertanyaan as $item)
                                                        <div class="question-group px-0 mb-3">
                                                            <div class="row">
                                                                <div class="col-11">
                                                                    <input type="text" name="pertanyaan[]"
                                                                        class="form-control" placeholder="Nama question"
                                                                        value="{{ $item->pertanyaan }}" />
                                                                </div>
                                                                <div class="col-1">
                                                                    <a
                                                                        href="{{ route('admin-survey-store-delete-ans', $item->id) }}">
                                                                        <button type="submit"
                                                                            class="btn btn-danger remove-question"
                                                                            @if ($pertanyaan->count() === 1) disabled @endif>
                                                                            Hapus
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    @foreach ($option as $item)
                                                                        <ul style="font-size: 1.1rem">
                                                                            <li>{{ $item->option }}</li>
                                                                        </ul>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                                <div class="col-12 px-0">
                                                    <button type="button" class="btn btn-primary add-question">Tambah
                                                        Pertanyaan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="bidangs_id" value="3">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block px-5">
                                        Simpan Pertanyaan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2023 | Develop by Liny Jaya Informatika</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection

@push('addon-script')
    <script>
        $('.add-question').on('click', function() {
            var questionGroup =
                '<div class="question-group px-0 mb-3">' +
                '<div class="row">' +
                '<div class="col-11">' +
                '<input type="text" name="pertanyaan[]" class="form-control" placeholder="Nama question">' +
                '</div>' +
                '<div class="col-1">' +
                '<form action="{{ route('admin-survey.destroy', $item->id) }}" method="post">' +
                '@csrf' +
                '@method('delete')' +
                '<button type="submit" class="btn btn-danger remove-question">Hapus</button>' +
                '</form>' +
                '</div>' +
                '<div class="col-12 mt-2">' +
                '@foreach ($option as $item)' +
                '<ul style="font-size: 1.1rem">' +
                '<li>{{ $item->option }}</li>' +
                '</ul>' +
                '@endforeach' +
                '</div>' +
                '</div>' +
                '</div>'
            $('.question-container').append(questionGroup)

        })

        // Remove question
        $('.question-container').on('click', '.remove-question', function() {
            $(this).closest('.question-group').remove()
        })
    </script>
@endpush
