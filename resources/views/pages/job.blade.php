@extends('layouts.pages')

@section('title')
    Tugas & Fungsi
@endsection

@section('content')
    <div class="page-job">
        <div class="container">
            <div class="content">
                @foreach ($job as $item)
                    <p>
                        {!! $item->tugas !!}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
