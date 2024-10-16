@extends('layouts.app')

@section('content')
<main class="main">
    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container" style="margin-top: 110px; background-color: #f8f9fa; border-radius: 15px; padding: 30px;">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                                {
                                  "loop": true,
                                  "speed": 600,
                                  "autoplay": {
                                    "delay": 5000
                                  },
                                  "slidesPerView": "auto",
                                  "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                  },
                                  "breakpoints": {
                                    "320": {
                                      "slidesPerView": 1,
                                      "spaceBetween": 40
                                    },
                                    "1200": {
                                      "slidesPerView": 1,
                                      "spaceBetween": 1
                                    }
                                  }
                                }
                              </script>

                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/img_h_6.jpg') }}" alt="Image" class="img-fluid" style="border-radius: 15px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/satu.png') }}" alt="Image" class="img-fluid" style="border-radius: 15px;">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <span class="section-subtitle" data-aos="fade-up"
                            style="font-size: 16px; color: #a9ac23; letter-spacing: 1px; font-style: italic;">Karya
                            Sastra</span>
                        <h1 class="mb-4" data-aos="fade-up"
                            style="color: #699b76; font-size: 20px; font-weight: bold; line-height: 1.5;">
                            Ada begitu banyak insan di dunia ini, namun hanya sedikit yang mampu mendengarkan setiap kata
                            yang terucap dengan penuh makna.
                        </h1>
                        <p data-aos="fade-up"
                            style="font-size: 15px; color: #7c8f81; line-height: 1.8; font-family: 'Georgia', serif;">
                            Fatamorgana yang kuciptakan bukanlah untuk mengaburkan, melainkan untuk menghadirkan keindahan
                            melalui ilusi sastra. Anganku terukir dalam kata-kata, merangkai impian yang membawamu ke dalam
                            dunia yang lebih indah. Setiap goresan kalimat terselip makna, mengajakmu berkelana dalam
                            keajaiban dan keindahan yang tak terduga.
                            <span
                                style="display: block; font-size: 22px; font-weight: bold; color: #699b76; margin-top: 10px;">🥀🌷</span>
                        </p>

                    <div class="d-flex justify-content-start mt-5" data-aos="fade-up">
                        <p class="me-3">
                            <a href="{{ route('pages.cerpen.index') }}" class="btn btn-get-started" style="transition: background-color 0.3s; border-radius: 25px;">Cerpen</a>
                        </p>
                        <p class="me-3">
                            <a href="{{ route('pages.puisi.index') }}" class="btn btn-get-started" style="transition: background-color 0.3s; border-radius: 25px;">Puisi</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section" style="background-color: #ffffff; padding: 50px 0;">
            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <p style="font-size: 40px; font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2); margin: 0; padding: 10px 0;">
                    ✨ Karya Sastra ✨
                </p>
                <h2 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #333; font-size: 32px; margin-bottom: 20px;">
                    Posting Karya
                </h2>
                <hr style="border-top: 2px solid #0dc225; width: 50%; margin: 20px auto; border-radius: 5px;">
                <p style="font-family: 'Georgia', 'Times New Roman', serif; color: #555; font-size: 18px; margin-top: 10px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Temukan berbagai karya sastra yang menginspirasi dan menggugah imajinasi. Nikmati setiap kata dan kalimat yang tergores dan penuh makna ini.
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <!-- Cerpen Terbaru -->
                <h3 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #333; margin-top: 30px;">Cerpen Terbaru</h3>
                <div class="row">
                    @foreach($cerpen as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm border-light" style="border-radius: 15px; transition: transform 0.3s; position: relative;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-family: 'Palatino', serif; font-weight: bold; color: #0f0f11;">{{ $item->title }}</h5>
                                    <p class="text-muted">
                                        <small>Ditulis oleh: {{ $item->user->name }} pada {{ $item->created_at->format('d M Y') }}</small>
                                    </p>
                                    <p class="card-text" style="color: #666; font-style: italic;">{{ Str::limit($item->content, 100) }}</p>
                                    <a href="{{ route('pages.cerpen.show', $item->id) }}" class="mt-auto text-primary"
                                        style="text-decoration: none; font-weight: bold;">Baca Cerpen »</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                <!-- Puisi Terbaru -->
                <h3 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #333; margin-top: 30px;">Puisi Terbaru</h3>
                <div class="row">
                    @foreach($puisi as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm border-light" style="border-radius: 15px; transition: transform 0.3s; position: relative;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-family: 'Palatino', serif; font-weight: bold; color: #0f0f11;">{{ $item->title }}</h5>
                                    <p class="text-muted">
                                        <small>Ditulis oleh: {{ $item->user->name }} pada {{ $item->created_at->format('d M Y') }}</small>
                                    </p>
                                    <p class="card-text" style="color: #666; font-style: italic;">{{ Str::limit($item->content, 100) }}</p>
                                    <a href="{{ route('pages.puisi.show', $item->id) }}" class="mt-auto text-primary"
                                        style="text-decoration: none; font-weight: bold;">Baca Puisi »</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </section>
        <!-- /Blog Posts Section -->
</main>

    <x-footer />
    
@endsection
