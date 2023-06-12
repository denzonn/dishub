@extends('layouts.pages')

@section('title')
    Denah Kantor
@endsection

@section('content')
    <div class="page-structure">
        <div class="container">
            <div class="content">
                <h2 class="text-center">Denah Kantor</h2>
                @foreach ($denah as $item)
                    <img src="{{ Storage::url($item->photo) }}" alt="">
                @endforeach
            </div>
        </div>
    </div>
@endsection
