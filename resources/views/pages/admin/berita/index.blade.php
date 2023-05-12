@extends('layouts.admin')

@section('title')
    Admin Berita
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
                    <h1 class="h3 mb-2 text-gray-800">Berita</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-right">
                            <a href="{{ route('news.create') }}" class="btn btn-primary w-100">Insert</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">No</th>
                                            <th style="width: 20%">Foto</th>
                                            <th style="width: 20%">Judul</th>
                                            <th style="width: 30%">Isi</th>
                                            <th style="width: 20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $noIncrement = 0;
                                        @endphp

                                        @foreach ($news as $item)
                                            <tr>
                                                <td>{{ $noIncrement += 1 }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($item->photo_news ?? '') }}" alt=""
                                                        style="width: 100px">
                                                </td>
                                                <td>{{ $item->judul_news ?? '' }}</td>
                                                <td>{!! $item->isi_news !!} </td>
                                                <td>
                                                    <a href="{{ route('news.edit', $item->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST"
                                                        style="display: inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger delete-news">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        $(document).on('click', '.delete-news', function(e) {

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
