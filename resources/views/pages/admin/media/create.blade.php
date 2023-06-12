@extends('layouts.admin')

@section('title')
    Admin Sosial Media
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Sosial Media</h1>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin-media-sosial-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="">Nama Sosial Media</label>
                                <input type="text" name="nama_sosmed" class="form-control"
                                    placeholder="Masukkan Nama Sosial Media" required>
                                <label for="" class="mt-3">Link Sosial Media</label>
                                <input type="text" name="link_sosmed" class="form-control"
                                    placeholder="Masukkan Link Sosial Media" required>
                                <label for="" class="mt-3">Icon Sosial Media</label>
                                <div>
                                    <input type="file" name="icon_sosmed" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Tambahkan</button>
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
        $(document).on('click', '.delete-gallery', function(e) {

            // Hentikan dahulu routenya menunggu konfirmasi dari sweetalert
            e.preventDefault();


            Swal.fire({
                title: 'Apakah yakin mau menghapus berita?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Lanjutkan route delete
                    setTimeout(() => {
                        $(this).closest("form").submit();

                    }, 2000); // 2000 ms = 2 detik

                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
