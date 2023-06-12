@extends('layouts.pages')

@section('title')
    Unit Kerja
@endsection

@section('content')
    <div class="page-job">
        <div class="container">
            <div class="content" style="font-family: 'Poppins', serif; ">
                <h4>{{ $unitKerja->nama }}</h4>
                <h6>Alamat : {{ $unitKerja->alamat }}</h6>
                <p class="mt-5" style="font-size: 1rem">Tugas & Fungsi :</p>
                <p style="font-size: 1rem">{!! $unitKerja->tugas !!}</p>
            </div>
        </div>
    </div>
@endsection
