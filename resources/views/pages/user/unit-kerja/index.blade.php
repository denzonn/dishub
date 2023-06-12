@extends('layouts.pages')

@section('title')
    Unit Kerja
@endsection

@section('content')
    <div class="page-job">
        <div class="container">
            <div class="content">
                <div class="row">
                    @foreach ($unitKerja as $item)
                        <div class="col-6 col-lg-4">
                            <a href="{{ route('unit-kerja-detail', $item->slug) }}" style="text-decoration: none">
                                <div class="card unit">
                                    <div class="card-header" style="background-color: #6c55f9; color: #fff">
                                        <h5 class="text-center">{{ $item->nama }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p style="font-size: 1rem">Lokasi : {!! $item->alamat !!}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
