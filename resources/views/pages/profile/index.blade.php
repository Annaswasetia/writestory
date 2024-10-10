@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="container" style="margin-top: 150px;">
        @if (Auth::check())
            <h1>Profil {{ Auth::user()->role === 'admin' ? 'Admin' : 'Pengguna' }}</h1>
            <div class="profile-info">
                <h2>Informasi Pribadi</h2>
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <!-- Tambahkan informasi lain jika perlu -->
            </div>
        @else
            <h1>Profil</h1>
            <p>Silakan login untuk melihat informasi profil Anda.</p>
        @endif

        <div class="actions">
            <h2>Aksi</h2>
            @if (Auth::check())
                <a href="{{ route('edit.profile') }}">Edit Profil</a>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </div>
@endsection
