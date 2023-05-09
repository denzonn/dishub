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
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="#">
                            <div class="card">
                                <div class="card-body">
                                    <div class="date">
                                        20 Maret 2023
                                    </div>
                                    <img src="/img/berita.jpg" alt="">
                                    <div class="news">
                                        MUDIK GRATIS 2023 BERSAMA ORANG KESAYANGAN
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
