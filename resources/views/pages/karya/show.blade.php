@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Detail Karya</h1>

    @if ($cerpen->count() > 0 && $puisi->count() > 0)
        <div class="mb-5">
            <h2 class="text-primary">Cerpen</h2>
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
                        <p class="card-text" style="font-style: italic;">{{ $item->content }}</p>
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
                        <h3 class="card-title">{{ $item->title }}</h3>
                        <p class="text-muted"><small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small></p>
                        <p class="card-text">{{ $item->content }}</p>
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
                    <p style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: center; background-color: #f0fff0; padding: 15px; border-radius: 10px; width: 80%; margin: 0 auto; font-size: 1.2rem;" class="text-dark">{!! nl2br(e($item->content)) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <p>Tidak ada karya untuk ditampilkan.</p>
    @endif

    <div class="text-center">
        <a href="{{ route('pages.karya.index') }}" class="btn btn-primary">Kembali ke Daftar Karya</a>
    </div>
</div>
@endsection
