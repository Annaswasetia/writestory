@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Cerpen</h1>
            <nav class="breadcrumbs">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                    <li style="margin-right: 8px;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Home
                        </a>
                    </li>

                    <li style="color: #555; font-weight: bold;">
                        Cerpen
                    </li>
                </ol>

            </nav>
        </div>
    </div>
    <div class="container my-5">
        <!-- Section Heading -->
        <div class="text-center mb-5" style="margin-top: 50px;">
            <h1 class="display-4 font-weight-bold text-primary bi-book"
                style="font-size: 50px; font-family: 'Georgia', 'Times New Roman', serif;">Karya Sastra</h1>
            <h3 style="font-family: 'Georgia', 'Times New Roman', serif; color: #4fa94f;">Cerpen</h3>
            <p class="lead text-muted">Hai kamu. Nikmatilah karya sastra yang berbentuk cerpen ini,karena setiap kalimat
                yang terukir
                disini mungkin saja akan membawamu ke dalam kisah yang tak terduga.
                mengungkap sebuah makna yang tersembunyi di balik setiap kata dan kalimat yang terukir.
            </p>
        </div>

        <hr style="border-top: 2px solid #13a713;">

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

            @foreach ($cerpen as $item)
                <!-- cerpen item -->
                <div class="col-12 mb-4">
                    <div class="card shadow-sm h-100 bg-light"
                        style="border-radius: 15px; overflow: hidden; border: 1px solid #dcdcdc;">
                        <div class="card-body d-flex flex-column">
                            <!-- Title -->
                            <h4 class="card-title"
                                style="color: rgb(13, 194, 37); font-family: 'Georgia', serif; font-weight: bold;">
                                {{ $item->title }}</h4>

                            <!-- Date and Author -->
                            <p class="text-muted small mb-2">
                                @if ($item->is_published)
                                    Dipublikasikan | Oleh {{ $item->user->name }}
                                @else
                                    Belum Dipublikasikan | Oleh {{ $item->user->name }}
                                @endif
                            </p>

                            <!-- Content Snippet -->
                            <p class="card-text text-secondary">{{ Str::limit($item->content, 300, '...') }}</p>

                            <!-- Read More Button tanpa border dan teks di sebelah kiri -->
                            <a href="{{ route('pages.cerpen.show', $item->id) }}" class="mt-auto text-primary"
                                style="text-decoration: none; font-weight: bold;">Read More »</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
