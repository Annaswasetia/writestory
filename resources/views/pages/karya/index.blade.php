@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Karya</h1>
            <nav class="breadcrumbs">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">
                    <li style="margin-right: 8px;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Home
                        </a>
                    </li>
                    <li style="color: #555; font-weight: bold;">
                        Karya
                    </li>
                </ol>

                <div class="py-3">
                    <a href="{{ url('/karya/create') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg"
                        style="
                        font-size: 20px; 
                        color: white; 
                        font-family: 'Georgia', 'Times New Roman', serif; 
                        background-color: #75be75; 
                        padding: 10px 25px; 
                        text-shadow: 1px 1px 2px rgba(0,0,0,0.2); 
                        border: 2px solid #4fa94f;
                        border-radius: 50px; 
                        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
                        display: inline-block;">
                        <i class="bi bi-pencil" style="margin-right: 8px;"></i>
                        Buat Karya
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <section class="container mt-3" style="margin-top: -20px;">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <h2 class="text-left"
                    style="font-family: 'Georgia', 'Times New Roman', serif; color: #4fa94f; margin-bottom: 20px;">✍️ Tips
                    Menulis Cerpen dan Puisi</h2>

                <div class="alert alert-info" role="alert">
                    <strong>📖 Tips Menulis Cerpen:</strong>
                    <ul>
                        <li>Fokus pada satu tema atau konflik utama untuk menjaga alur cerita tetap jelas.</li>
                        <li>Bangun karakter yang kuat dan realistis agar pembaca dapat merasakan kedalaman emosi mereka.
                        </li>
                        <li>Gunakan dialog yang alami untuk membawa cerita hidup dan menarik perhatian pembaca.</li>
                        <li>Pastikan setiap kalimat berkontribusi pada pengembangan cerita dan menambah ketegangan.</li>
                    </ul>
                </div>

                <div class="alert alert-info" role="alert">
                    <strong>✍️ Tips Menulis Puisi:</strong>
                    <ul>
                        <li>Ekspresikan perasaan dan emosi dengan bahasa yang kaya dan imajinatif.</li>
                        <li>Jelajahi berbagai bentuk puisi, seperti soneta atau haiku, untuk menemukan gaya yang paling
                            cocok untukmu.</li>
                        <li>Perhatikan ritme dan bunyi kata, karena ini bisa menciptakan pengalaman yang mendalam bagi
                            pembaca.</li>
                        <li>Cobalah untuk menggunakan metafora dan simile untuk menambahkan kedalaman pada puisi kamu.</li>
                    </ul>
                </div>

                <div class="info-box mb-4">
                    <h4 style="font-family: 'Georgia', 'Times New Roman', serif; color: #4fa94f;">✨ Mengapa Menulis Cerpen
                        dan Puisi itu Penting?</h4>
                    <p style="font-family: 'Georgia', 'Times New Roman', serif; color: #555;">
                        Menulis cerpen dan puisi bukan hanya tentang menciptakan karya seni, tetapi juga merupakan cara
                        untuk
                        mengekspresikan diri dan menyampaikan pesan. Setiap karya yang kamu buat adalah cerminan dari
                        pemikiran dan perasaanmu, serta sebuah cara untuk terhubung dengan orang lain.
                    </p>
                </div>

                <div class="info-box mb-4">
                    <h4 style="font-family: 'Georgia', 'Times New Roman', serif; color: #4fa94f;">🎉 Siap untuk Membagikan
                        Karyamu?</h4>
                    <p style="font-family: 'Georgia', 'Times New Roman', serif; color: #555;">
                        Silahkan kamu mengklik tombol "Buat Karya" yang sudah disediakan di atas. Mari kita mulai perjalanan
                        kreatifmu sekarang!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <hr style="border-top: 2px solid #13a713;">

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <div class="container">

            <!-- Judul dan Deskripsi -->
            <div class="section-title" data-aos="fade-up">
              <h2>
                  <span style="color: #ff6347;">Menjelajahi</span> 
                  Dunia Visual <i class="bi bi-stars" style="color: #ffdd57;"></i>
              </h2>
              <p>
                  <strong>Selamat datang di Galeri Visual kami!</strong> 
                  Di sini, <span style="color: #87ceeb;">langit</span> dan 
                  <span style="color: #ff69b4;">seni</span> bertemu, menciptakan kisah 
                  visual yang memukau. Nikmati keindahan penuh warna, setiap gambar 
                  memancarkan <em>ketenangan</em>, <em>inspirasi</em>, dan <em>energi baru</em>. 
                  <br><br>Selami setiap sudut galeri, dan biarkan <span style="color: #32cd32;">imajinasimu</span> 
                  terbang bebas dalam karya visual yang kami sajikan untukmu.
              </p>
          </div>

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-sky">Langit</li>
                    <li data-filter=".filter-art">Art</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="50" style="padding-top: 30px;">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                        <img src="assets/img/masonry-portfolio/bintang.jpeg" class="img-fluid" alt="" width="300"
                            height="200">
                        <div class="portfolio-info">
                            <h4>Art 1</h4>
                            <p>selalu senang ya?</p>
                            <a href="assets/img/masonry-portfolio/bintang.jpeg" title="App 1"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                        <img src="assets/img/masonry-portfolio/girl.jpeg" class="img-fluid" alt="" width="300"
                            height="200">
                        <div class="portfolio-info">
                            <h4>Art 2</h4>
                            <p>tenang, kamu pasti bisa ko.</p>
                            <a href="assets/img/masonry-portfolio/girl.jpeg" title="Product 1"
                                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                        <img src="assets/img/masonry-portfolio/bintang2.jpeg" class="img-fluid" alt=""
                            width="300" height="200">
                        <div class="portfolio-info">
                            <h4>Art 3</h4>
                            <p>gpp ga sesuai ekspektasi, usaha lagi.</p>
                            <a href="assets/img/masonry-portfolio/bintang2.jpeg" title="Branding 1"
                                data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
