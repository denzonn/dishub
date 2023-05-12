@extends('layouts.pages')

@section('title')
    Dinas Perhubungan Provinsi Sulawesi Selatan
@endsection

@section('content')
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <div class="carousel">
        <div class="page-banner home-banner">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="{{ asset('frontend/img/berita.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('frontend/img/brand_01.png') }}" alt="">
                </div>
            </div>
            <a href="#gallery" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 col-md-6 col-12 offset-lg-4">
                    <i class="fa-solid fa-calendar"></i> Berita Terbaru
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-end">
                    <a href="#" class="next">Selanjutnya > ></a>
                </div>
            </div>
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card-service wow fadeInUp">
                            <div class="header">
                                <img src="{{ Storage::url($item->photo_news) }}" alt="">
                            </div>
                            <div class="body">
                                <h5 class="text-secondary">{{ $item->judul_news }}</h5>
                                <p>
                                    {!! Str::limit($item->isi_news, 100) !!}
                                </p>
                                <a href="{{ route('news-detail', $item->slug_news) }}" class="btn btn-primary mt-3">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section bg-light" id="gallery">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Galery Foto</div>
                <div class="divider mx-auto"></div>
            </div>

            <div class="owl-carousel owl-theme py-3 wow zoomIn" id="owl-carousel1">
                @foreach ($gallery as $item)
                    <div class="item">
                        <div class="features">
                            <div class="image">
                                <img src="{{ Storage::url($item->photo_kegiatan) }}" alt="">
                            </div>
                            <h5>Kegiatan dilaksanakan di lapangan bakti makassar </h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection

@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#owl-carousel1').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>

    <script>
        $('document').ready(function() {
            // Back to top
            var backTop = $(".back-to-top");

            $(window).scroll(function() {
                if ($(document).scrollTop() > 400) {
                    backTop.css('visibility', 'visible');
                } else if ($(document).scrollTop() < 400) {
                    backTop.css('visibility', 'hidden');
                }
            });

            backTop.click(function() {
                $('html').animate({
                    scrollTop: 0
                }, 1000);
                return false;
            });
        });

        $('document').ready(function() {
            var nav_height = 70;

            $("a[data-role='smoothscroll']").click(function(e) {
                e.preventDefault();

                var position = $($(this).attr("href")).offset().top - nav_height;

                $("body, html").animate({
                    scrollTop: position
                }, 1000);
                return false;
            });
        });
    </script>
@endpush
