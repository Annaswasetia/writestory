@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100" style="margin-top: 40px;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong bg-light" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                    <form action="{{ route('login')}}" method="POST">
                        @csrf

                        <h3 class="mb-5">Sign-In WriteStory</h3>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                placeholder="E-Mail" />
                      

                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        <div data-mdb-input-init class="form-outline mb-4 position-relative">
                            <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                placeholder="Password" />
                            <i class="bi bi-eye-slash position-absolute" id="togglePassword"
                                style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>

                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                        <script>
                            const togglePassword = document.getElementById('togglePassword');
                            const passwordField = document.getElementById('password');

                            togglePassword.addEventListener('click', function(e) {
                                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordField.type = type;

                                this.classList.toggle('bi-eye');
                                this.classList.toggle('bi-eye-slash');
                            });
                        </script>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label ms-2" for="form1Example3"> Remember password </label>
                        </div>


                        <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg"
                            style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">Sign-In</button>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="{{ route('register') }}"
                                    class="link-danger">Sign-Up</a>
                            </p>
                        </div>
                        

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection