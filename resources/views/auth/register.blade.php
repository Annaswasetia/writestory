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
@endSection