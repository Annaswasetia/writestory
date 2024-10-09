@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" style="margin-top: 110px;">
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
                                    <img src="{{ asset('assets/img/img_h_6.jpg') }}" alt="Image" class="img-fluid">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/img/satu.png') }}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-1">
                        <span class="section-subtitle" data-aos="fade-up"
                            style="font-size: 15px; color:rgb(169, 172, 35) ">Welcome</span>
                        <h1 class="mb-4" data-aos="fade-up" style="color: #699b76">
                            Not every human on this planet can pour out sentences with a beautiful voice.
                        </h1>
                        <p data-aos="fade-up" style="font-size: 18px; color: #7c8f81">
                            Writing becomes an addiction for some people who find it difficult to pour sentences with a
                            beautiful voice.
                            By writing, the sentence will become eternal in every stroke of his hand.
                        </p>

                        <div class="d-flex justify-content-start mt-5" data-aos="fade-up">
                            <!-- Ubah justify-content-center menjadi justify-content-start -->
                            <p class="me-3"> <!-- Menambahkan margin kanan -->
                                <a href="{{ route('pages.category.cerpen.index') }}" class="btn btn-get-started">Cerpen</a>
                            </p>
                            <p class="me-3">
                                <a href="{{ route('pages.category.puisi.index') }}" class="btn btn-get-started">Puisi</a>
                            </p>
                        </div>

                    </div>


                </div>
            </div>


            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <p>Recent Posts</p>
                    <h2>Blog Posts</h2>
                </div><!-- End Section Title -->
                <div class="container">

                    <div class="row gy-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="post-entry" data-aos="fade-up" data-aos-delay="100">
                                <a href="#" class="thumb d-block"><img src="assets/img/img_h_4.jpg" alt="Image"
                                        class="img-fluid rounded"></a>

                                <div class="post-content">
                                    <div class="meta">
                                        <a href="#" class="cat">Development</a> •
                                        <span class="date">July 20, 2020</span>
                                    </div>
                                    <h3><a href="#">There live the blind texts they live</a></h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.
                                    </p>

                                    <div class="d-flex author align-items-center">
                                        <div class="pic">
                                            <img src="assets/img/team/team-3.jpg" alt="Image"
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <div class="author-name">
                                            <strong class="d-block">Winston Gold</strong>
                                            <span class="">Lead Product Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="post-entry" data-aos="fade-up" data-aos-delay="200">
                                <a href="#" class="thumb d-block"><img src="assets/img/img_h_2.jpg" alt="Image"
                                        class="img-fluid rounded"></a>

                                <div class="post-content">
                                    <div class="meta">
                                        <a href="#" class="cat">Development</a> •
                                        <span class="date">July 20, 2020</span>
                                    </div>
                                    <h3><a href="#">There live the blind texts they live</a></h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.
                                    </p>

                                    <div class="d-flex author align-items-center">
                                        <div class="pic">
                                            <img src="assets/img/team/team-2.jpg" alt="Image"
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <div class="author-name">
                                            <strong class="d-block">Winston Gold</strong>
                                            <span class="">Lead Product Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="post-entry" data-aos="fade-up" data-aos-delay="300">
                                <a href="#" class="thumb d-block"><img src="assets/img/img_h_3.jpg" alt="Image"
                                        class="img-fluid rounded"></a>

                                <div class="post-content">
                                    <div class="meta">
                                        <a href="#" class="cat">Development</a> •
                                        <span class="date">July 20, 2020</span>
                                    </div>
                                    <h3><a href="#">There live the blind texts they live</a></h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.
                                    </p>

                                    <div class="d-flex author align-items-center">
                                        <div class="pic">
                                            <img src="{{ asset('assets/img/team/team-1.jpg') }}" alt="Image"
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <div class="author-name">
                                            <strong class="d-block">Winston Gold</strong>
                                            <span class="">Lead Product Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Blog Posts Section -->
    </main>
@endsection
