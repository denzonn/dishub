@extends('layouts.pages')

@section('title')
    Pengaduan Masyarakat
@endsection

@section('content')
    <div class="page-pengaduan">
        <div class="container">
            <h1 class="h3 mb-2 text-gray-800 text-center" style="font-family: 'Poppins', serif">Silahkan Input Aduan Anda</h1>

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
            <div class="card shadow mb-4 w-100">
                <div class="card-body">
                    <form action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <label>NIK <span class="star">*</span></label>
                        <input type="number" class="form-control mb-4" name="nik_pengadu"
                            placeholder="Nomor Induk Kependudukan" required>
                        <label>Nama <span class="star">*</span></label>
                        <input type="text" class="form-control mb-4" name="nama_pengadu" placeholder="Nama Lengkap"
                            required>
                        <label>Email <span class="star">*</span></label>
                        <input type="email" class="form-control mb-4" name="email_pengadu" placeholder="Email" required>
                        <label>No HP <span class="star">*</span></label>
                        <input type="number" class="form-control mb-4" name="no_hp_pengadu" placeholder="No Hp / Whatsapp"
                            required>
                        <label>Judul Pengaduan <span class="star">*</span></label>
                        <input type="text" class="form-control mb-4" name="judul_pengaduan" placeholder="Judul Pengajuan"
                            required>
                        <label>Pengaduan <span class="star">*</span></label>
                        <textarea name="isi_pengaduan" id="editor" cols="30" rows="10"></textarea>
                        <label class="mt-4">Foto Aduan Anda <span class="star">*</span></label>
                        <div>
                            <input type="file" class="form-control-file mt-4" name="photo_pengaduan" required>
                        </div>
                        <label class="mt-4">Foto KTP Anda <span class="star">*</span></label>
                        <div>
                            <input type="file" class="form-control-file mt-4" name="photo_ktp" required>
                        </div>
                        <button class="btn btn-primary w-100 mt-5" type="submit">Simpan</button>
                    </form>
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
