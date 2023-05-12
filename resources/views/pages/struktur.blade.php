@extends('layouts.pages')

@section('title')
    Struktur Organisasi
@endsection

@section('content')
    <div class="page-structure">
        <div class="container">
            <div class="content">
                @foreach ($struktur as $item)
                    <img src="{{ Storage::url($item->photo_structure) }}" alt="">
                @endforeach
            </div>
        </div>
    </div>
@endsection
