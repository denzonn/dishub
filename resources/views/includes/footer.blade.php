<footer class="page-footer bg-image"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('frontend/img/flyover.png') }});">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-md-6 col-lg-4 py-3">
                <div class="image">
                    <img src="{{ asset('frontend/img/logoperhubungan.png') }}" alt="">
                    <div>Website Resmi Dinas Perhubungan Provinsi Sulawesi Selatan</div>
                </div>
                <div class="row mt-2">
                    <div class="col-1">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="col-11">
                        <h6> Jl. Perintis Kemerdekaan No.Km. 15, Pai, Kec. Biringkanaya,
                            Kota Makassar, Sulawesi Selatan 90242
                        </h6>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 py-3">
                        @php
                            $sosmed = App\Models\Sosmed::all();
                        @endphp
                        @foreach ($sosmed as $item)
                            <div class="row">
                                <div class="col-1">
                                    <a href="{{ $item->link_sosmed }}">
                                        <img src="{{ Storage::url($item->icon_sosmed) }}" alt=""
                                            style="height: 1rem">
                                    </a>
                                </div>
                                <div class="col-11">
                                    <h6> {{ $item->nama_sosmed }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h5 style="color: #fff">Link Terkait :</h5>
                @php
                    $link = App\Models\LinkTerkait::all();
                @endphp
                @foreach ($link as $item)
                    <p class="mt-0 mb-1"><a style="text-decoration: none;" target="_blank"
                            href="{{ $item->link }}">{{ $item->nama }}</a></p>
                @endforeach
            </div>
            <div class="col-12 col-md-6 col-lg-4 py-3">
                <div class="maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1987.0043376631588!2d119.51050063967284!3d-5.102295900421244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefb7fca0b7d27%3A0xd762f42f936eb229!2sDinas%20Perhubungan%20Provinsi%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1683515773201!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <p class="text-center" id="copyright">Copyright &copy; 2023. All rights reserved | <a
                href="https://www.google.com/maps/place/Dinas+Perhubungan+Provinsi+Sulawesi+Selatan/@-5.1026379,119.5114555,19z/data=!4m6!3m5!1s0x2dbefb7fca0b7d27:0xd762f42f936eb229!8m2!3d-5.1030006!4d119.5123519!16s%2Fg%2F1hm4f9s1r"
                style="text-decoration: none" target="_blank">Dinas Perhubungan Provinsi Sulawesi Selatan</a></p>
    </div>
</footer>
