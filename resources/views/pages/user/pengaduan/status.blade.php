@extends('layouts.pages')

@section('title')
    Pengaduan Masyarakat
@endsection

@section('content')
    <div class="page-pengaduan">
        <div class="container">
            <h1 class="h3 mb-2 text-gray-800 text-center" style="font-family: 'Poppins', serif">Daftar Pengaduan Masyarakat
            </h1>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">No HP</th>
                                <th scope="col" class="text-center">Judul Pengaduan</th>
                                <th scope="col" class="text-center">Isi Pengaduan</th>
                                <th scope="col" class="text-center">Foto</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $item->nama_pengadu }}</td>
                                    <td class="text-center">{{ $item->email_pengadu }}</td>
                                    <td class="text-center">{{ $item->no_hp_pengadu }}</td>
                                    <td class="text-center">{{ $item->judul_pengaduan }}</td>
                                    <td class="text-center">{!! $item->isi_pengaduan !!}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url($item->photo_pengaduan) }}" alt="" width="100px">
                                    </td>
                                    <td class="text-center status" style="text-transform: uppercase; font-weight: 700">
                                        {{ $item->status_pengaduan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        // Buatkan warna tiap status
        const status = document.querySelectorAll('.status');
        status.forEach((item) => {
            if (item.innerHTML === 'cancel') {
                item.style.color = 'red';
            }
        });
    </script>
@endpush
