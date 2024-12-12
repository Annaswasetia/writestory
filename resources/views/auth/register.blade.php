@extends('layouts.app')

@section('content')
    <section class="min-vh-100">
        <div class="container py-5 h-100" style="margin-top: 50px;">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong bg-light" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Register</h3>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="name" name="name" id="name" class="form-control form-control-lg"
                                        placeholder="Name" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="E-Mail" />
                                </div>

                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div data-mdb-input-init class="form-outline mb-4 position-relative">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg" placeholder="Password" />
                                    <i class="bi bi-eye-slash position-absolute" id="togglePassword"
                                        style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                </div>
                                
                                <script>
                                    const togglePassword = document.getElementById('togglePassword');
                                    const passwordField = document.getElementById('password');
                                
                                    togglePassword.addEventListener('click', function () {
                                        // Toggle password field type
                                        const type = passwordField.type === 'password' ? 'text' : 'password';
                                        passwordField.type = type;
                                
                                        // Toggle icon classes
                                        this.classList.toggle('bi-eye');
                                        this.classList.toggle('bi-eye-slash');
                                    });
                                </script>
                                

                                <div data-mdb-input-init class="form-outline mb-4 position-relative">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-lg" placeholder="Confirm Password" />
                                    <i class="bi bi-eye-slash position-absolute" id="togglePasswordConfirmation"
                                        style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                </div>

                                <script>
                                    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
                                    const passwordConfirmationField = document.getElementById('password_confirmation');

                                    togglePasswordConfirmation.addEventListener('click', function() {
                                        const type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
                                        passwordConfirmationField.type = type;

                                        // Ganti ikon
                                        this.classList.toggle('bi-eye');
                                        this.classList.toggle('bi-eye-slash');
                                    });
                                </script>


                                <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg"
                                    style="font-size: 20px; color: rgb(235, 20, 20); font-family: 'Georgia', 'Times New Roman', serif;">Sign-Up</button>

                                <p class="text-center" style="font-size: 16px; color: #555;">
                                    Do you have an account? <a href="{{ route('login') }}"
                                        style="color: #0dc225; font-weight: bold;">Log in here</a>
                                </p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
