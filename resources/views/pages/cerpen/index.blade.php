@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Section Heading -->
        <div class="text-center mb-5" style="margin-top: 150px;">
            <h1 class="display-4 font-weight-bold text-primary"
                style="font-size: 50px; font-family: 'Georgia', 'Times New Roman', serif;">Karya Sastra</h1>
            <h3 style="font-family: 'Georgia', 'Times New Roman', serif;">Cerpen</h3>
            <p class="lead text-muted">Nikmati kumpulan cerpen yang telah dipublikasikan oleh para penulis berbakat.</p>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($cerpen as $item)
                <!-- Loop through each cerpen item -->
                <div class="col-md-6 col-lg-4 mb-4">
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
                            <p class="card-text text-secondary">{{ Str::limit($item->content, 100, '...') }}</p>

                            <!-- Read More Button -->
                            <a href="{{ route('pages.cerpen.show', $item->id) }}"
                                class="mt-auto btn btn-outline-primary btn-sm">Read More »</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
