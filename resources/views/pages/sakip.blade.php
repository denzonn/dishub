@extends('layouts.pages')

@section('title')
    Sakip
@endsection

@section('content')
    <div class="page-sakip">
        <div class="container">
            <div class="content">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th style="width: 50%">Judul</th>
                                        <th style="width: 20%">File</th>
                                        <th style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $noIncrement = 0;
                                    @endphp

                                    @foreach ($sakip as $item)
                                        <tr>
                                            <td>{{ $noIncrement += 1 }}</td>
                                            <td>{{ $item->judul_sakip ?? '' }}</td>
                                            <td>
                                                <a href="{{ Storage::url($item->file_sakip) }}" target="_blank"
                                                    class="btn"><i class="fa-solid fa-file"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('sakip.edit', $item->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('sakip.destroy', $item->id) }}" method="POST"
                                                    style="display: inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger delete-news">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
