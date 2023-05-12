@extends('layouts.pages')

@section('title')
    Visi & Misi
@endsection

@section('content')
    <div class="page-visi">
        <div class="container">
            @foreach ($visi as $item)
                <div class="image mt-3">
                    <img src="{{ Storage::url($item->photo) }}" alt="">
                </div>
                <h3>
                    Visi dan Misi Provinsi Sulawesi Selatan Tahun 2019-2024
                </h3>
                <div class="content">
                    <p>
                        {!! $item->visi !!}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
