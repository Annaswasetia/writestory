@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 150px;">
        <div class="card mb-4 shadow-lg" style="border-radius: 15px; background-color: #f8f9fa;">
            <div class="card-body p-5" style="position: relative;">

                <h1 class="card-title"
                    style="font-family: 'Palatino', serif; color: #0f0f11; font-size: 2.8rem; text-shadow: 2px 2px 5px rgba(9, 211, 9, 0.5);">
                    {{ $puisi->title }}
                </h1>

                <div class="d-flex justify-content-between">
                    <p class="text-muted">
                        <small><strong>Ditulis oleh:</strong> {{ $puisi->user->name }}</small>
                    </p>
                    <p class="text-muted">
                        <small><strong>Kategori:</strong> {{ $puisi->category }}</small>
                    </p>
                </div>

                <p class="text-muted">
                    <small><strong>Diterbitkan pada:</strong> {{ $puisi->created_at->format('d M Y') }}</small>
                </p>

                <p class="text-muted">
                    <small><strong>Karya:</strong> {{ $puisi->karya->title }}</small> <!-- Menampilkan judul karya -->
                </p>

                <hr style="border-top: 2px solid #9dd99d;">

                <div
                    style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: center; background-color: #f0fff0; padding: 15px; border-radius: 10px; width: 80%; margin: 0 auto; font-size: 1.2rem;">
                    <p class="text-dark">{!! nl2br(e($puisi->content)) !!}</p>
                </div>

                @if ($puisi->is_published)
                    <span class="badge bg-success"
                        style="font-size: 1rem; position: absolute; top: 10px; right: 10px; padding: 10px 15px;">Diterbitkan</span>
                @else
                    <span class="badge bg-warning"
                        style="font-size: 1rem; position: absolute; top: 10px; right: 10px; padding: 10px 15px;">Draft</span>
                @endif
            </div>
        </div>

        <div class="d-flex align-items-start">
            <!-- Button Back -->
            <a href="{{ route('pages.puisi.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-arrow-left mr-2"
                style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">
                Back
            </a>

            <!-- Button Update -->
            <a href="{{ route('pages.puisi.edit', $puisi->id) }}"
                class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-pencil mr-2"
                style="font-size: 20px; color: rgb(58, 68, 66); font-family: 'Georgia', 'Times New Roman', serif;">
                Update
            </a>

            @if (Auth::check() && Auth::user()->role === 'admin')
                <form action="{{ route('puisi.destroy', $puisi->id) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus puisi ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-trash mr-2"
                        style="font-size: 20px; color: rgb(255, 0, 0); font-family: 'Georgia', 'Times New Roman', serif;">Delete</button>
                </form>
            @endif

        </div>

    </div>
@endsection
