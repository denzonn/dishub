@extends('layouts.pages')

@section('title')
    Survey Masyarakat
@endsection

@section('content')
    <div class="page-survey">
        <div class="container">
            <form action="{{ route('form-survey-store-penunjang') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        Data Diri
                    </div>
                    <div class="card-body">
                        <label>Nama Lengkap <span class="star">*</span></label>
                        <input type="text" class="form-control mb-4" name="nama" placeholder="Nama Lengkap" required>
                        <label>Jenis Kelamin <span class="star">*</span></label>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="jenis_kelamin" value="laki-laki" checked> Laki-laki
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="jenis_kelamin" value="perempuan"> Perempuan
                        </div>
                        <label>Pekerjaan <span class="star">*</span></label>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="pelajar" checked> Pelajar/Mahasiswa
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="pns"> PNS
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="tni"> TNI
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="polri"> POLRI
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="bumn"> BUMN
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="swasta"> Pegawai Swasta
                        </div>
                        <div class="form-check">
                            <input type="radio" class=" mb-4" name="pekerjaan" value="wiraswasta"> Wiraswasta
                        </div>
                        <label>Email <span class="star">*</span></label>
                        <input type="email" class="form-control mb-4" name="email" placeholder="Masukkan Email"
                            required>
                    </div>
                    <hr class="m-4">
                    <div class="card-body">
                        <h4>Pertanyaan Kuisioner</h4>
                        <div class="question"
                            style="font-size: 1.2rem; font-weight: 300; overflow-y: scroll; height: 600px">
                            @php
                                $increment = 0;
                                $iterasi = 1;
                            @endphp
                            @foreach ($pertanyaan as $item)
                                <div class="form-group">
                                    <p><b style="font-weight: 500">{{ $increment += 1 }}.</b> {{ $item->pertanyaan }}
                                    </p>
                                    @foreach ($option as $ops)
                                        <div class="form-check">
                                            <input type="radio" name="answer-{{ $iterasi }}" class="mb-4"
                                                value="{{ $ops->id }}">
                                            {{ $ops->option }}
                                        </div>
                                    @endforeach
                                </div>
                                @php
                                    $iterasi += 1;
                                @endphp
                            @endforeach
                            <label>Tuliskan komentar/usulan Saudara terhadap kemajuan dan pengembangan pelayanan kepuasan
                                masyarakat</label>
                            <textarea name="usulan" cols="30" rows="3" class="form-control "></textarea>
                        </div>
                    </div>
                    <hr class="m-4">
                    <button class="btn btn-primary m-4 text-center">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
