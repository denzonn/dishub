@extends('layouts.pages')

@section('title')
    Pejabat Struktural
@endsection

@section('content')
    <div class="page-pejabat">
        <div class="container">
            <div class="content">
                <h4 class="text-center">Data Pejabat</h4>
                <div class="row">
                    @foreach ($pejabat as $item)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ Storage::url($item->photo_pejabat) }}" alt="">
                                    <div class="desc">
                                        <div class="name">{{ $item->nama_pejabat }}</div>
                                        <div class="jabatan">{{ $item->jabatan->jabatan }}</div>
                                        <div class="nip">{{ $item->nip_pejabat }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
