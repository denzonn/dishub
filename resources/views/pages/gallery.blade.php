@extends('layouts.pages')

@section('title')
    Gallery Kegiatan
@endsection

@section('content')
    <div class="page-gallery">
        <div class="container">
            <div class="content">
                <h4 class="text-center">Gallery Kegiatan</h4>
                <div class="row">
                    @foreach ($gallery as $item)
                        <div class="col-12 col-md-6 col-lg-4 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ Storage::url($item->photo_kegiatan) }}" alt="">
                                    <div class="title">
                                        {{ $item->judul_kegiatan }}
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
