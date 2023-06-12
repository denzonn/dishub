@extends('layouts.pages')

@section('title')
    Survey Masyarakat
@endsection

@section('content')
    <div class="page-survey">
        <div class="container">
            <h4 class="text-center">Silahkan Pilih Bidang Terlebih Dahulu</h4>
            <div class="row mt-lg-5 mt-2">
                <div class="col-12 col-lg-3">
                    <a href="{{ route('form-survey-lalu-lintas') }}" style="text-decoration: none; color: #6c55f9">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="{{ asset('frontend/img/lalulintas.jpg') }}" alt="" class="w-100 m-0"
                                    style="height: 200px; object-fit: cover">
                                <h5 class="p-1 pt-2 text-center">
                                    Program Lalu Lintas
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3">
                    <a href="{{ route('form-survey-pelayaran') }}" style="text-decoration: none; color: #6c55f9">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="{{ asset('frontend/img/pelayaran.jpg') }}" alt="" class="w-100 m-0"
                                    style="height: 200px; object-fit: cover">
                                <h5 class="p-1 pt-2 text-center">
                                    Program Pelayaran
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3">
                    <a href="{{ route('form-survey-kereta-api') }}" style="text-decoration: none; color: #6c55f9">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="{{ asset('frontend/img/keretaapi.jpg') }}" alt="" class="w-100 m-0"
                                    style="height: 200px; object-fit: cover">
                                <h5 class="p-1 pt-2 text-center">
                                    Program Perkeretaapian
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3">
                    <a href="{{ route('form-survey-penunjang-urusan-pemerintahan-umum') }}"
                        style="text-decoration: none; color: #6c55f9">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="{{ asset('frontend/img/penunjang.jpeg') }}" alt="" class="w-100 m-0"
                                    style="height: 200px; object-fit: cover">
                                <h5 class="p-1 pt-2 text-center">
                                    Program Penunjang Urusan Pemerintahan Umum
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
