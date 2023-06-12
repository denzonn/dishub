@extends('layouts.pages')

@section('title')
    Mitra Kerja
@endsection

@section('content')
    <div class="page-job">
        <div class="container">
            <div class="content">
                <div class="row">
                    @foreach ($mitra as $item)
                        <div class="col-6 col-lg-4">
                            <div class="card ">
                                <div class="card-body p-0">
                                    <img src="{{ Storage::url($item->photo) }}" alt="" class="w-100">
                                    <div class="p-2">
                                        <h3 class="text-center">{{ $item->judul }}</h3>
                                        <p style="font-size: 0.7rem">{!! $item->description !!}</p>
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
