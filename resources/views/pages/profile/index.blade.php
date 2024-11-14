@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="page-title light-background" style="padding-top: 120px;">
    <div class="container">
        <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Profile</h1>
        <nav class="breadcrumbs">
            <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                <li style="margin-right: 8px;">
                    <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                        Home
                    </a>
                </li>

                <li style="color: #555; font-weight: bold;">
                    Profile
                </li>
            </ol>

        </nav>
    </div>
</div>

<div class="container" style="margin-top: 50px;">
    @if (Auth::check())
        <div class="text-center">
            <h1 style="font-size: 40px; color: #0dc225; font-weight: bold; font-family: 'Georgia', serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
                Profile {{ Auth::user()->role === 'admin' ? 'Admin' : 'Author' }}
            </h1>
            <div class="profile-info border p-4 rounded mt-4" style="background-color: #ffffff; width: 450px; margin: 0 auto; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); border-radius: 15px;">
                <h2 style="font-size: 22px; color: #4fa94f; font-weight: bold;">Informasi Pribadi</h2>
                <div style="text-align: left; padding: 15px; background-color: #f3f7f2; border-radius: 10px; margin-top: 20px;">
                    <p style="font-size: 18px; color: #333;">
                        <i class="bi bi-person-fill" style="color: #4fa94f; margin-right: 5px;"></i>
                        <strong>Nama:</strong> {{ Auth::user()->name }}
                    </p>
                    <p style="font-size: 18px; color: #333;">
                        <i class="bi bi-envelope-fill" style="color: #4fa94f; margin-right: 5px;"></i>
                        <strong>Email:</strong> {{ Auth::user()->email }}
                    </p>
                    <p style="font-size: 18px; color: #333;">
                        <i class="bi bi-shield-lock-fill" style="color: #4fa94f; margin-right: 5px;"></i>
                        <strong>Role:</strong> {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Author' }}
                    </p>
                </div>

                <div class="actions mt-4 text-center">
                    <a href="{{ route('logout') }}" class="btn btn-danger mt-3" style="font-weight: bold; padding: 8px 20px; border-radius: 8px; color: #fff; text-decoration: none;"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <h1 style="font-size: 28px; font-weight: bold; color: #0dc225;">Profil</h1>
            <p style="font-size: 18px; color: #555;">Silakan login untuk melihat informasi profil Anda.</p>
            <a href="{{ route('login') }}" class="btn btn-success mt-3" style="font-weight: bold; padding: 8px 20px; border-radius: 8px; color: #fff; text-decoration: none;">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        </div>
    @endif
</div>
@endsection
