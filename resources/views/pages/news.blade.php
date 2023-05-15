@extends('layouts.pages')

@section('title')
    Berita
@endsection

@section('content')
    <div class="page-news">
        <div class="container">
            <div class="content">
                <h4>Berita Kegiatan</h4>
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('news-detail', $item->slug_news) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="date">
                                            {{ $tanggal ?? '' }}
                                        </div>
                                        <img src="{{ Storage::url($item->photo_news) }}" alt="">
                                        <div class="news">
                                            {{ $item->judul_news }}
                                        </div>
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
