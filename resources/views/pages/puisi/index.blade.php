@extends('layouts.app')

@section('content')
<div class="page-title light-background" style="padding-top: 120px;">
    <div class="container">
        <h1>Puisi</h1>
        <nav class="breadcrumbs">
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
        <!-- Section Heading -->
        <div class="text-center mb-5" style="margin-top: 50px;">
            <h1 class="display-4 font-weight-bold text-primary bi-book"
                style="font-size: 50px; font-family: 'Georgia', 'Times New Roman', serif;">Karya Sastra</h1>
            <h3 style="font-family: 'Georgia', 'Times New Roman', serif;">Puisi</h3>
            <p class="lead text-muted">Hai kamu yang menemukannya. Nikmatilah puisi ini, karena setiap
                kata yang terukir terkadang menyimpan sebuah pesan yang mendalam dari hati yang belum bisa terucap</p>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($puisi as $item)
                <!-- Loop through each cerpen item -->
                <div class="col-12 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <!-- Title -->
                            <h4 class="card-title">{{ $item->title }}</h4>

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
                            <a href="{{ route('pages.puisi.show', $item->id) }}"
                               class="mt-auto text-primary"
                               style="text-decoration: none; font-weight: bold;">Read More »</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
