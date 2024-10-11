@extends('layouts.app')

@section('content')

<div class="page-title light-background" style="padding-top: 120px;">
    <div class="container">
        <h1>Karya</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Karya</li>
            </ol>

            <div class="py-3">
                <a href="{{ url('/karya/create') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg"
                    style="font-size: 20px; color: rgb(117, 190, 117); font-family: 'Georgia', 'Times New Roman', serif;">
                    <i class="bi bi-pencil"></i>
                    Buat Karya
                </a>
            </div>
        </nav>
    </div>
</div>
@endsection