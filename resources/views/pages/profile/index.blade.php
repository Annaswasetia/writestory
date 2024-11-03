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
    <div class="container" style="margin-top: 70px;">
        @if (Auth::check())
            <div class="text-center">
                <h1 style="font-size: 40px; color: rgb(79, 161, 93); font-weight: bold; font-family: 'Georgia', 'Times New Roman', serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">Profil {{ Auth::user()->role === 'admin' ? 'Admin' : 'Author' }}</h1>
                <div class="profile-info border p-4 rounded" style="background-color: #ffffff; width: 400px; margin: 0 auto; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); border-radius: 15px;">
                    <h2 style="text-align: center; font-size: 24px; margin-bottom: 20px; color: #333;">Informasi Pribadi</h2>
                    <div style="text-align: left; padding: 10px; background-color: #e6eee0; border-radius: 10px;">
                        <p style="font-size: 18px; color: #555;"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                        <p style="font-size: 18px; color: #555;"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p style="font-size: 18px; color: #555;"><strong>Role:</strong>
                            {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Penulis' }}</p>
                    </div>

                    <div class="actions mt-4 text-center">
                        <h2 style="text-align: center; font-size: 15px; margin-bottom: 20px; color: #333;">Aksi</h2>
                        <div>
                            <a href="{{ route('logout') }}" class="bi bi-box-arrow-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center">
                <h1 style="font-size: 28px; font-weight: bold;">Profil</h1>
                <p>Silakan login untuk melihat informasi profil Anda.</p>
            </div>
        @endif
    </div>
@endsection
