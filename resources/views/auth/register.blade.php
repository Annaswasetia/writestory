<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>WriteStory</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>

<body>

    <x-header />

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign up</h3>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="name" name="name" id="name" class="form-control form-control-lg"
                                    placeholder="Name" />
                            </div>

                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" name="email" id="email" class="form-control form-control-lg"
                                    placeholder="E-Mail" />
                            </div>

                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-lg"
                                    placeholder="Password" />
                            </div>

                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg"
                                    placeholder="Confirm Password" />
                            </div>

                            <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg"
                                style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">Sign-Up</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
