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
                        <li>Mencari ide: Ide cerpen bisa didapatkan dari pengalaman pribadi atau mengamati kehidupan orang
                            lain.</li>
                        <li>Menentukan tema: Tema atau gagasan utama adalah pondasi dari sebuah cerita.</li>
                        <li>Menyusun kerangka cerita: Kerangka cerita atau outline akan membantu menjaga alur cerita tetap
                            fokus dan terstruktur.</li>
                        <li>Fokus pada satu tema atau konflik utama untuk menjaga alur cerita tetap jelas.</li>
                        <li>Bangun karakter yang kuat dan realistis agar pembaca dapat merasakan kedalaman emosi mereka.
                        </li>
                        <li>Menentukan latar atau setting: Latar atau setting adalah segala keterangan mengenai waktu,
                            ruang, dan suasana dalam suatu cerita.</li>
                        <li>Gunakan dialog yang alami untuk membawa cerita hidup dan menarik perhatian pembaca.</li>
                        <li>Pastikan setiap kalimat berkontribusi pada pengembangan cerita dan menambah ketegangan.</li>
                        <li>Setelah selesai menulis, bacalah lagi dan koreksi.</li>
                    </ul>
                </div>

                <div class="alert alert-info" role="alert">
                    <strong>📖 Tips Menulis Puisi:</strong>
                    <ul>
                        <li>Ekspresikan perasaan dan emosi dengan bahasa yang kaya dan imajinatif.</li>
                        <li>Memperhatikan Diksi dan Rima: Diksi atau pemilihan kata dan rima
                            akan membuat puisi lebih harmonis dan enak didengar. Pilihlah kata-kata yang sesuai unsur
                            keindahan sekaligus makna yang padat, serta perhatikan pola rima yang digunakan.</li>
                        <li>Menggunakan Gaya Bahasa:
                            Gaya bahasa dapat membuat puisi lebih menarik dan bermakna. Gunakan gaya bahasa sesuai tema dan
                            suasana puisi.
                            Beberapa gaya bahasa yang dapat digunakan dalam puisi antara lain metafora, simile, dan
                            personifikasi.</li>
                        </li>
                        <li>Periksa kembali puisi yang sudah dibuat, apakah pemilihan kata sudah baik dan puisi enak dibaca
                            atau tidak.</li>
                    </ul>
                </div>

                <div class="info-box mb-4">
                    <h3 style="font-family: 'Georgia', 'Times New Roman', serif; color: #4fa94f;">✨ Mengapa Menulis Cerpen
                        dan Puisi</h3>
                    <p style="font-family: 'Georgia', 'Times New Roman', serif; color: #555;">
                        Menulis cerpen dan puisi bukan hanya tentang menciptakan karya seni, tetapi juga merupakan cara
                        untuk
                        mengekspresikan diri dan menyampaikan pesan. Setiap karya yang kamu buat adalah cerminan dari
                        pemikiran dan perasaanmu, serta sebuah cara untuk terhubung dengan orang lain.
                    </p>
                </div>

                <div class="alert alert-info" role="alert">
                    <h3 style="font-family: 'Georgia', 'Times New Roman', serif; color: #4fa94f;">✨ Siap untuk Membagikan
                        Karyamu?</h3>
                    <p style="font-family: 'Georgia', 'Times New Roman', serif; color: #555;">
                        <strong>Sebelum kamu mulai menulis, perhatikanlah beberapa hal berikut ini:</strong>
                        <li>Semua kolom wajib di isi.</li>
                        <li>Jika ada kolom yang belum di isi, otomatis akan kembali ke halaman create.</li>
                        <li>Jika kamu lupa untuk mengklik checkbox publish karya, dan saat kamu mengklik tombol publish akan langsung mengarah ke halaman draft.</li>
                        <li>Di halaman draft kamu bisa edit karya dan publish karya kamu.</li>
                        <li>Cerpen atau puisi yang kamu mau buat harus merupakan karya asli atau pemikiran sendiri.</li>
                        <li>Tidak boleh copy karya orang lain atau melakukan plagiarisme!!!</li>
                        <li>Hanya Admin yang bisa menghapus cerpen dan puisi.</li>
                        <br>
                        <strong>Silahkan kamu mengklik tombol "Buat Karya" yang sudah disediakan di atas. Mari kita mulai
                            perjalanan
                            kreatifmu sekarang!</strong>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <hr style="width: 50cm; height: 40px; background-color: #adb9b9; border: none; margin: 0,5rem auto 1rem;">
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section" style="background-color: #ffffff; padding: 20px 0;">

        <div class="container">

            <!-- Judul dan Deskripsi -->
            <div class="section-title" data-aos="fade-up">
                <h1
                    style="text-align: center; font-size: 2.5rem; color: #87ceeb; font-family: 'Cinzel', serif; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
                    <span style="font-weight: bold;">Menjelajahi Dunia Visual</span>
                    <i class="bi bi-stars" style="color: #87ceeb; font-size: 3rem;"></i>
                </h1>
                <h4 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #555">
                    Art | Sky
                </h4>
                <p style="font-family: 'Arial', sans-serif; font-size: 16px; line-height: 1.8; max-width: 750px; margin: 0 auto; color: #6c757d;">
                    Jelajahi keindahan seni dan langit yang memukau. Langit yang selalu menyembunyikan keindahan dengan
                    rupa yang berbeda.
                    Bentala tidak mungkin bisa memeluk cakrawala, jadi karena itu, mari lihat keindahannya tanpa memiliki,
                    karena mengagumi jauh lebih senang🖊️🌫️.
                </p>
            </div>

            <div class="isotope-layout" data-default-filter=".filter-art" data-layout="masonry" data-sort="original-order"
                style="padding-top: 5px;">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter=".filter-art" class="filter-active"><i class="bi bi-paint-bucket"></i>Art</li>
                    <li data-filter=".filter-sky"><i class="bi bi-cloud"></i>Sky</li>
                </ul>

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="50"
                        style="padding-top: 30px;">

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/satu.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p>selalu senang ya?</p>
                                <a href="assets/img/gambar/satu.jpeg" title="Art 1" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/dua.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p>tenang, kamu pasti bisa ko.</p>
                                <a href="assets/img/gambar/dua.jpeg" title="Art 2"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/tiga.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p>gpp ga sesuai ekspektasi, usaha lagi.</p>
                                <a href="assets/img/gambar/tiga.jpeg" title="Art 3"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/sembilan.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/sembilan.jpg" title="Art 9"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/sepuluh.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/sepuluh.jpg" title="Art 10"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/sebelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/sebelas.jpg" title="Art 11"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/duabelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/duabelas.jpg" title="Art 12"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/tigabelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/tigabelas.jpg" title="Art 13"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/empatbelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/empatbelas.jpg" title="Art 14"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/limabelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/limabelas.jpg" title="Art 15"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/enambelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/enambelas.jpg" title="Art 16"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/tujuhbelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/tujuhbelas.jpg" title="Art 17"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/delapanbelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/delapanbelas.jpg" title="Art 18"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/sembilanbelas.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/sembilanbelas.jpg" title="Art 19"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/empat.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/empat.jpg" title="Art 4"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/lima.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/lima.jpg" title="Art 5"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/enam.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/enam.jpg" title="Art 6"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/tujuh.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/tujuh.jpg" title="Art 7"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-art">
                            <img src="assets/img/gambar/delapan.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Art</h4>
                                <p></p>
                                <a href="assets/img/gambar/delapan.jpg" title="Art 8"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <!-- langit -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/satu.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Sky</h4>
                                <p>...</p>
                                <a href="assets/img/langit/satu.jpeg" title="Sky 1"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/dua.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/dua.jpeg" title="Sky 2"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/tiga.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/tiga.jpeg" title="Sky 3"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/empat.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/empat.jpeg" title="Sky 4"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/lima.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/lima.jpeg" title="Sky 5"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/enam.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/enam.jpeg" title="Sky 6"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/tujuh.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/tujuh.jpeg" title="Sky 7"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/delapan.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/delapan.jpeg" title="Sky 8"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/sembilan.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/sembilan.jpeg" title="Sky 9"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/sepuluh.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/sepuluh.jpeg" title="Sky 10"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/sebelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/sebelas.jpeg" title="Sky 11"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/duabelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/duabelas.jpeg" title="Sky 12"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/tigabelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/tigabelas.jpeg" title="Sky 13"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/empatbelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/empatbelas.jpeg" title="Sky 14"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/limabelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/limabelas.jpeg" title="Sky 15"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/enambelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/enambelas.jpeg" title="Sky 16"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/tujuhbelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/tujuhbelas.jpeg" title="Sky 17"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/delapanbelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/delapanbelas.jpeg" title="Sky 18"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/sembilanbelas.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/sembilanbelas.jpeg" title="Sky 19"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/duapuluh.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/duapuluh.jpeg" title="Sky 20"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/duasatu.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/duasatu.jpeg" title="Sky 21"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/duadua.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/duadua.jpeg" title="Sky 22"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/duatiga.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/duatiga.jpeg" title="Sky 23"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/duaempat.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/duaempat.jpeg" title="Sky 24"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-sky">
                            <img src="assets/img/langit/dualima.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h5>Sky</h5>
                                <p>...</p>
                                <a href="assets/img/langit/dualima.jpeg" title="Sky 25"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div>

            </div>

        </div>

    </section>
@endsection
