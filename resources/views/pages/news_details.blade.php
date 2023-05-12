@extends('layouts.pages')

@section('title')
    Detail Berita
@endsection

@section('content')
    <div class="page-detail-news">
        <div class="image">
            <div class="text">
                <div class="date">{{ $tanggal }}</div>
                <div class="judul">
                    {{ $news->judul_news }}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="image2">
                    <img src="{{ Storage::url($news->photo_news) }}" alt="">
                </div>
                <div class="text">
                    {!! $news->isi_news !!}
                </div>
            </div>
        </div>
    </div>
@endsection
