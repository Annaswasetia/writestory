@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Puisi</h1>
            <nav class="breadcrumbs" style="font-family: 'Open Sans', sans-serif;">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                    <li style="margin-right: 8px;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Home
                        </a>
                    </li>
                    <li style="color: #555; font-weight: bold;">
                        Puisi
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4 text-primary bi-book" 
                style="font-family: 'Georgia', serif; font-weight: bold; letter-spacing: 2px; text-shadow: 2px 2px #e8e8e8;">
                Karya Sastra
            </h1>
            <h3 class="mb-4" 
                style="font-family: 'Georgia', serif; color: linear-gradient(to right, #13a713, #4fa94f); text-transform: uppercase; text-shadow: 1px 1px #d4fcd4;">
                Puisi
            </h3>
            <p class="lead" 
               style="font-family: 'Open Sans', sans-serif; font-size: 18px; line-height: 1.8; max-width: 750px; margin: 0 auto; color: #6c757d;">
                Hai kamu. Nikmatilah sebuah karya sastra yang berbentuk puisi ini, karena setiap
                kata dan kalimat panjang yang terukir terkadang menyimpan sebuah pesan yang mendalam dari hati yang belum bisa terucap.            </p>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row mb-4" style="margin-top: 10px;">
                <form action="{{ route('pages.puisi.index') }}" method="GET" class="d-flex w-100 justify-content-left">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari puisi..." 
                        value="{{ request('search') }}" 
                        style="border-radius: 15px; border: 1px solid #dcdcdc; max-width: 400px;">
                    <button type="submit" class="btn btn-success" style="border-radius: 15px;">Search</button>
                </form>
            </div>
            @foreach ($puisi as $item)
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 bg-light"
                        style="border-radius: 15px; overflow: hidden; transition: transform 0.3s;">
                        <div class="card-body d-flex flex-column">
                            <!-- Title -->
                            <h4 class="card-title"
                                style="color: rgb(13, 194, 37); font-family: 'Georgia', serif; font-weight: bold;">
                                {{ $item->title }}
                            </h4>

                            <!-- Date and Author -->
                            <p class="text-muted small mb-2" style="font-family: 'Open Sans', sans-serif;">
                                @if ($item->is_published)
                                    Dipublikasikan | Oleh {{ $item->user->name }}
                                @endif
                            </p>

                            <!-- Content Snippet -->
                            <p class="card-text text-secondary" style="font-family: 'Open Sans', sans-serif;">
                                {{ Str::limit($item->content, 300, '...') }}
                            </p>

                            <!-- Read More Button -->
                            <a href="{{ route('pages.puisi.show', $item->id) }}" class="mt-auto text-primary"
                                style="text-decoration: none; font-weight: bold; transition: color 0.3s;">
                                Read More »
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
