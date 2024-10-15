@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Section Heading -->
        <div class="text-center mb-5" style="margin-top: 150px;">
            <h1 class="display-4 font-weight-bold text-primary"
                style="font-size: 50px; font-family: 'Georgia', 'Times New Roman', serif;">Karya Sastra</h1>
            <h3 style="font-family: 'Georgia', 'Times New Roman', serif;">Puisi</h3>
            <p class="lead text-muted">Hai kamu yang menemukannya. Nikmatilah puisi ini, karena setiap kata yang terukir terkadang menyimpan sebuah pesan yang mendalam dari hati yang belum bisa terucap</p>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($puisi as $item)
                <!-- Loop through each cerpen item -->
                <!-- Menggunakan col-12 untuk membuat card selebar kontainer -->
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