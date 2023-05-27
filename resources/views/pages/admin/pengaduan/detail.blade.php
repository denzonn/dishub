@extends('layouts.admin')

@section('title')
    Pengaduan Masyarakat
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
                    <h1 class="h3 mb-2 text-gray-800">Detail Pengaduan Masyarakat</h1>

                    <div class="card shadow">
                        <div class="card-body">
                            <img src="{{ Storage::url($pengaduan->photo_pengaduan) }}" alt="" style="height: 10rem">
                            <div class="text">
                                <h4 class="mt-4" style="font-weight: 700">{{ $pengaduan->judul_pengaduan }}</h4>
                                <div class="status-pengajuan">
                                    <label>Status Pengaduan : <span class="status"
                                            style="text-transform: uppercase; font-weight: 700">{{ $pengaduan->status_pengaduan }}</span></label>
                                </div>
                                <div class="tanggal">
                                    <label for="">Tanggal Pengajuan : <span>{{ $tanggal }}</span></label>
                                </div>
                                <div class="data">
                                    <label for="">Data Diri Pengaju :
                                        <ul>
                                            <li>{{ $pengaduan->nama_pengadu }}</li>
                                            <li>{{ $pengaduan->email_pengadu }}</li>
                                            <li>{{ $pengaduan->no_hp_pengadu }}</li>
                                        </ul>
                                    </label>
                                </div>
                                <div class="isi-pengaduan">
                                    Berita Pengaduan :
                                    <p>{!! $pengaduan->isi_pengaduan !!}</p>
                                </div>
                            </div>
                            <form action="{{ route('admin-pengaduan.update', $pengaduan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-3">
                                        <select name="status_pengaduan" class="form-control option">
                                            <option value="cancel">Cancel</option>
                                            <option value="proses">Proses</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary update">Update Status</button>
                                    </div>
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
        $(document).ready(function() {
            $('.status').each(function() {
                if ($(this).text() == 'proses') {
                    $(this).addClass('text-success')
                } else if ($(this).text() == 'cancel') {
                    $(this).addClass('text-danger')
                } else {
                    $(this).addClass('text-warning')
                }
            })
        })
    </script>

    <script>
        let btn = document.querySelector('.update')
        let option = document.querySelector('.option')
        let status = document.querySelector('.status')

        // Set button dan option jadi none ketika status cancel atau proses
        if (status.textContent == 'cancel' || status.textContent == 'proses') {
            btn.style.display = 'none'
            option.style.display = 'none'
        }
    </script>
@endpush
