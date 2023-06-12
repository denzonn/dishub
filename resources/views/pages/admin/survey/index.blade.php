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
                    <h3 class="text-center mb-lg-3">Survey Masyarakat</h3>
                    <a href="{{ route('admin-survey-option') }}" class="btn btn-primary">TAMBAH OPSI</a>
                    <div class="row survey">
                        <div class="col-12 col-lg-6 mt-2">
                            <a href="{{ route('admin-survey-lalu-lintas.create') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-traffic-light"></i>
                                        <span>Lalu
                                            Lintas</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mt-2">
                            <a href="{{ route('admin-survey-kereta.create') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-traffic-light"></i>
                                        <span>Kereta Api</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mt-2">
                            <a href="{{ route('admin-survey-pelayaran.create') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-traffic-light"></i>
                                        <span>Pelayaran</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mt-2">
                            <a href="{{ route('admin-survey-penunjang.create') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-traffic-light"></i>
                                        <span>Penunjang Urusan Pemerintahan Umum</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Survey</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($survey as $index => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $totals[$index] }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>

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
