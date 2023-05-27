@extends('layouts.pages')

@section('title')
    Pengaduan Masyarakat
@endsection

@section('content')
    <div class="page-pengaduan">
        <div class="container">
            <h3 class="text-center">Layanan Masyarakat</h3>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-4 mt-4">
                    <a href="{{ route('pengaduan.create') }}" class="text-center">
                        <div class="pengaduan">
                            <div class="icon ">
                                <img src="{{ asset('frontend/img/report.png') }}" alt="">
                            </div>
                            <div class="title">
                                Kirim Pengaduan
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-4 mt-4">
                    <a href="{{ route('pengaduan.status') }}" class="text-center">
                        <div class="pengaduan">
                            <div class="icon ">
                                <img src="{{ asset('frontend/img/status.png') }}" alt="">
                            </div>
                            <div class="title">
                                Status Pengaduan
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-4 mt-4">
                    <a href="https://wa.me/" class="text-center">
                        <div class="pengaduan">
                            <div class="icon ">
                                <img src="{{ asset('frontend/img/cs.png') }}" alt="">
                            </div>
                            <div class="title">
                                Costumer Service
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
