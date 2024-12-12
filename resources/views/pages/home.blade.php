@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container" style="margin-top: 100px;">
                <div class="row align-items-center justify-content-between">

                    <!-- Swiper Image Gallery -->
                    <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2" data-aos="fade-up" data-aos-delay="400">
                        <div class="swiper init-swiper">

                            <!-- Swiper Configuration Script -->
                            <script type="application/json" class="swiper-config">
                                {
                                    "loop": true,
                                    "speed": 600,
                                    "autoplay": { "delay": 5000 },
                                    "slidesPerView": "auto",
                                    "pagination": {
                                        "el": ".swiper-pagination",
                                        "type": "bullets",
                                        "clickable": true
                                    },
                                    "breakpoints": {
                                        "320": { "slidesPerView": 1, "spaceBetween": 40 },
                                        "1200": { "slidesPerView": 1, "spaceBetween": 1 }
                                    }
                                }
                            </script>

                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/img/img_h_6.jpg') }}" alt="Image" class="img-fluid"
                                        style="border-radius: 15px;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/img/satu.png') }}" alt="Image" class="img-fluid"
                                        style="border-radius: 15px;">
                                </div>
                            </div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="col-lg-4 order-lg-1">
                        <span class="section-subtitle" data-aos="fade-up"
                            style="font-size: 16px; color: #98995d; letter-spacing: 1px; font-style: italic;">
                            Welcome WriteStory
                        </span>

                        <h1 class="mb-4" data-aos="fade-up"
                            style="color: #699b76; font-size: 18px; font-weight: bold; font-style: italic; line-height: 1.5;">
                            Ada begitu banyak insan di dunia ini, namun hanya sedikit yang mampu mendengarkan setiap kata
                            yang terucap dengan penuh makna.
                        </h1>

                        <p data-aos="fade-up"
                            style="font-size: 15px; color: #7c8f81; line-height: 1.8; font-family: 'Georgia', serif;">
                            Fatamorgana yang kuciptakan bukanlah untuk mengaburkan, melainkan untuk menghadirkan keindahan
                            melalui ilusi sastra. Anganku terukir dalam kata-kata, merangkai impian yang membawamu ke dalam
                            dunia yang lebih indah. Setiap goresan kalimat terselip makna, mengajakmu berkelana dalam
                            keajaiban dan keindahan yang tak terduga 🥀🌷.
                        </p>

                        <div class="d-flex justify-content-start mt-5" data-aos="fade-up">
                            <p class="me-3">
                                <a href="{{ route('pages.cerpen.index') }}" class="btn btn-get-started"
                                    style="transition: background-color 0.3s, transform 0.3s; border-radius: 25px; display: flex; align-items: center;">
                                    <i class="bi bi-book me-2"></i> Cerpen
                                </a>
                            </p>
                            <p class="me-3">
                                <a href="{{ route('pages.puisi.index') }}" class="btn btn-get-started"
                                    style="transition: background-color 0.3s, transform 0.3s; border-radius: 25px; display: flex; align-items: center;">
                                    <i class="bi bi-book me-2"></i> Puisi
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- About 2 Section -->
        <section id="about-2" class="about-2 section light-background">
            <div class="container">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
                            <div class="img-wrap text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
                                <div class="img">
                                    <img src="assets/img/wow.jpeg" alt="circle image" class="img-fluid"
                                        style="border-radius: 50%; width: 350px; height: 450px; border: 4px solid #9bb8a2;">
                                </div>
                            </div>
                        </div>

                        <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
                            <div class="px-3">
                                <span class="content-subtitle"
                                    style="font-size: 15px; color: #7c8f81; line-height: 1.8; font-family: 'Georgia', serif;">Fatamorgana</span>
                                <h2 class="content-title text-start"
                                    style="font-size: 20px; color: #b3b02c; line-height: 1.5; font-family: 'Georgia', serif; text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
                                    Dia si pemilik nayanika dengan sinarnya yang begitu indah bagaikan arunika, juga tak
                                    kalah indah bagaikan sinar rembulan.
                                </h2>
                                <p class="lead"
                                    style="font-size: 16px; color: #699b76; line-height: 1.6; font-family: 'Georgia', serif;">
                                    Dia hanyalah fatamorgana yang ingin aku jadikan nyata lewat aksara diksi ku.
                                </p>
                                <p class="mb-5"
                                    style="font-size: 15px; color: #b3b02c; line-height: 1.6; font-family: 'Georgia', serif;">
                                    Amerta namun fana, harsa nan hampa rasanya. Bersamamu ataupun tidaknya,
                                    senang bisa mengenalmu hanya lewat diksi ku saja.
                                </p>
                                <div style="display: flex; gap: 10px;">
                                    <p>
                                        <a href="{{ route('home') }}" class="btn-get-started"
                                            style="background-color: #699b76; color: white; padding: 10px 20px; border-radius: 25px; transition: background-color 0.3s, transform 0.3s;">
                                            Home
                                        </a>
                                    </p>
                                    <p>
                                        <a href="{{ route('login') }}" class="btn-get-started"
                                            style="background-color: #699b76; color: white; padding: 10px 20px; border-radius: 25px; transition: background-color 0.3s, transform 0.3s;">
                                            Login
                                        </a>
                                    </p>
                                    <p>
                                        <a href="{{ auth()->check() ? (auth()->user()->role === 'admin' ? route('profileadmin') : route('profile')) : 'login' }}" 
                                            class="btn-get-started" 
                                            style="background-color: #699b76; color: white; padding: 10px 20px; border-radius: 25px; transition: background-color 0.3s, transform 0.3s;">
                                            Profile
                                         </a>
                                         
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Karya Section -->
        <section id="blog-posts" class="blog-posts section" style="background-color: #ffffff; padding: 50px 0;">
            <div class="container text-center" data-aos="fade-up">
                <p
                    style="font-size: 40px; font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2); margin: 0; padding: 10px 0;">
                    ✦ - Karya Sastra - ✦
                </p>
                <h4 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #555">
                    Cerpen | Puisi
                </h4>
                <hr style="border-top: 2px solid #0dc225; width: 50%; margin: 20px auto; border-radius: 5px;">
                <p
                    style="font-family: 'Georgia', 'Times New Roman', serif; color: #555; font-size: 18px; margin-top: 10px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Temukan berbagai karya sastra cerpen dan puisi yang menginspirasi dan menggugah imajinasi.
                    Nikmati setiap kata pada kalimat yang terukir, setiap kata yang terukir mungkin saja terdapat keindahan yang tersembunyi
                    didalamnya
                    🥀🍃.
                </p>
            </div>

            
            @if ($cerpen->count() > 0) <!-- Cerpen terbaru, memastikan data cerpen ada -->
                <div class="container" style="margin-top: 50px;">
                    <h3 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: black">
                        Cerpen Terbaru
                    </h3>
                    <div class="row">
                        @foreach ($cerpen as $item) <!-- perulangan digunakan untuk menampilkan setiap cerpen -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #f5f5f5; transition: transform 0.3s; position: relative;">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="font-family: 'Palatino', serif; font-weight: bold; color: #69697a;">
                                            {{ $item->title }}
                                        </h5>
                                        <p class="text-muted">
                                            <small>Ditulis oleh: {{ $item->user->name }} | pada
                                                {{ $item->created_at->format('d M Y') }}</small>
                                        </p>
                                        <p class="card-text" style="color: #666; font-style: italic;">
                                            {{ Str::limit($item->content, 100) }}
                                        </p>
                                        <!--mengarahkan pengguna ke halaman detail cerpen berdasarkan ID-nya-->
                                        <a href="{{ route('pages.cerpen.show', $item->id) }}" class="text-primary"
                                            style="text-decoration: none; font-weight: bold;">
                                            Baca Cerpen »
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Puisi Terbaru -->
            @if ($puisi->count() > 0)
                <div class="container" style="margin-top: 30px;">
                    <h3 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: black">
                        Puisi Terbaru
                    </h3>
                    <div class="row">
                        @foreach ($puisi as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #f5f5f5; transition: transform 0.3s; position: relative;">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="font-family: 'Palatino', serif; font-weight: bold; color: #69697a;">
                                            {{ $item->title }}
                                        </h5>
                                        <p class="text-muted">
                                            <small>Ditulis oleh: {{ $item->user->name }} | pada
                                                {{ $item->created_at->format('d M Y') }}</small>
                                        </p>
                                        <p class="card-text" style="color: #666; font-style: italic;">
                                            {{ Str::limit($item->content, 100) }}
                                        </p>

                                        <!--mengarahkan pengguna ke halaman detail puisi berdasarkan ID-nya-->
                                        <a href="{{ route('pages.puisi.show', $item->id) }}" class="text-primary"
                                            style="text-decoration: none; font-weight: bold;">
                                            Baca Puisi »
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>

    </main>

@endsection
