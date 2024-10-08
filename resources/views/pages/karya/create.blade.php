<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>WriteStory</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
      
        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
      
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
      
        <!-- Main CSS File -->
        <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
      
        <!-- =======================================================
        * Template Name: Active
        * Template URL: https://bootstrapmade.com/active-bootstrap-website-template/
        * Updated: Aug 07 2024 with Bootstrap v5.3.3
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
      </head>
<body>

    <x-header/>

<div class="container" style="margin-top: 200px;">
    <h1 class="text-center mb-4" style="font-size: 50px; color: rgb(117, 190, 117); font-family: 'Georgia', 'Times New Roman', serif;">
        <i class="bi bi-pencil" style="margin-right: 10px;"></i>Buat Karya Baru
    </h1>

    <form action="{{ route('karya.store') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf <!-- Token untuk keamanan CSRF -->

        <div class="form-group mb-4">
            <label for="title" class="form-label">Judul Karya <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Masukkan judul karya">
        </div>

        <div class="form-group mb-4">
            <label for="content" class="form-label">Konten Karya <span class="text-danger">*</span></label>
            <textarea class="form-control" id="content" name="content" required placeholder="Masukkan konten karya" style="resize: none; overflow: hidden;"></textarea>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const contentArea = document.getElementById('content');

                contentArea.addEventListener('input', function () {
                    this.style.height = 'auto'; // Reset height
                    this.style.height = this.scrollHeight + 'px'; // Adjust height based on content
                });
            });
        </script>

        <div class="form-group mb-4">
            <label for="category" class="form-label">Kategori Karya<span class="text-danger">*</span></label>
            
            <div class="form-check">
                <input type="radio" name="category" id="cerpen" value="cerpen" class="form-check-input" />
                <label for="cerpen" class="form-check-label">Cerpen</label>

            </div>
            <div class="form-check">
                <input type="radio" name="category" id="puisi" value="puisi" class="form-check-input" />
                <label for="puisi" class="form-check-label">Puisi</label>

            </div>
        </div>

        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg" 
            style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">Publish</button>

            <a href="{{ route('karya.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg" 
            
            style="font-size: 20px; color: rgb(24, 46, 24); font-family: 'Georgia', 'Times New Roman', serif;">Kembali</a>
        </div>
    </form>

    <div class="text-center mt-3">
        <small class="text-muted">* Semua kolom yang ditandai dengan <span class="text-danger">*</span> adalah wajib diisi.</small>
    </div>
</div>
</body>
</html>