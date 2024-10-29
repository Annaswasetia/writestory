@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detail Karya</h1>

        @if ($cerpen->count() > 0 && $puisi->count() > 0)
            <div class="mb-5">
                @foreach ($cerpen as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->title }}</h3>
                            <p class="text-muted"><small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small></p>
                            <p class="card-text">{{ $item->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-5">
                <h2 class="text-primary">Puisi</h2>
                @foreach ($puisi as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->title }}</h3>
                            <p class="text-muted"><small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small></p>
                            <p class="card-text"
                                style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: justify; color: #333; background-color: #f0f0f0; padding: 15px; border-radius: 8px;">
                                {!! nl2br(e($item->content)) !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif ($cerpen->count() > 0)
            <div class="mb-5">
                <h2 class="text-primary">Cerpen</h2>
                @foreach ($cerpen as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title"
                                style="font-family: 'Palatino', serif; color: #0f0f11; font-size: 2.8rem; text-shadow: 2px 2px 5px rgba(9, 211, 9, 0.5);">
                                {{ $item->title }}</h3>
                            <p class="text-muted">
                                <small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small>
                            </p>
                            <p class="text-muted">
                                <small><strong>Kategori:</strong> {{ $item->category }}</small>
                            </p>

                            <hr style="border-top: 2px solid #919b91;">

                            <p class="card-text"
                                style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: justify; background-color: #ffffff; padding: 15px; border-radius: 10px;">
                                {!! nl2br(e($item->content)) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif ($puisi->count() > 0)
            <div class="mb-5">
                <h2 class="text-primary">Puisi</h2>
                @foreach ($puisi as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->title }}</h3>
                            <p class="text-muted"><small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small></p>
                            <p class="text-muted">
                                <small><strong>Kategori:</strong> {{ $item->category }}</small>
                            </p>
                            <p class="card-text"
                                style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: justify; color: #333; background-color: #f0f0f0; padding: 15px; border-radius: 8px;">
                                {!! nl2br(e($item->content)) !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Tidak ada karya untuk ditampilkan.</p>
        @endif

        <div class="d-flex align-items-start mt-3">
            <a href="{{ route('pages.karya.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-arrow-left mr-2"
                style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">
                Back
            </a>
        </div>
    </div>
@endsection
