@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Cerpen</h1>
            <nav class="breadcrumbs" style="font-family: 'Open Sans', sans-serif;">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                    <li style="margin-right: 8px;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Home
                        </a>
                    </li>
                    <li style="color: #555; font-weight: bold;">
                        Detail Cerpen
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container" style="margin-top: 70px;">
        <h1 class="card-title"
            style="font-family: 'Palatino', serif; color: #0f0f11; font-size: 2.8rem; text-shadow: 2px 2px 5px rgba(9, 211, 9, 0.5);">
            {{ $cerpen->title }}
        </h1>

        <div class="d-flex justify-content-between">
            <p class="text-muted">
                <small><strong>Ditulis oleh:</strong> {{ $cerpen->user->name }}</small>
            </p>
            <p class="text-muted">
                <small><strong>Kategori:</strong> {{ $cerpen->category }}</small>
            </p>
        </div>

        <p class="text-muted">
            <small><strong>Diterbitkan pada:</strong> {{ $cerpen->created_at->format('d M Y') }}</small>
        </p>

        <p class="text-muted">
            <small><strong>Karya:</strong> {{ $cerpen->karya->title }}</small>
        </p>

        <hr style="border-top: 2px solid #919b91;">

        <div
            style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: justify; background-color: #ffffff; padding: 15px; border-radius: 10px; font-size: 17px;">
            <p class="text-dark">{!! nl2br(e($cerpen->content)) !!}</p>
        </div>

        <div class="mt-3">
            @if ($cerpen->is_published)
                <span class="badge bg-success" style="font-size: 1rem; padding: 10px 15px;">Diterbitkan</span>
            @else
                <span class="badge bg-warning" style="font-size: 1rem; padding: 10px 15px;">Draft</span>
            @endif
        </div>

        <hr style="border-top: 2px solid #919b91;">

        <div class="d-flex align-items-start mt-3">
            <!-- Button Back -->
            <a href="{{ route('pages.cerpen.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-arrow-left-circle mr-2"
                style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">
                Back
            </a>

            <!-- Button Update -->
            @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->id === $cerpen->user_id))
                <a href="{{ route('pages.cerpen.edit', $cerpen->id) }}"
                    class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-pencil mr-2"
                    style="font-size: 20px; color: rgb(58, 68, 66); font-family: 'Georgia', 'Times New Roman', serif;">
                    Update
                </a>
            @endif

            <!-- Button delete -->
            @if (Auth::check() && Auth::user()->role === 'admin')
                <form action="{{ route('cerpen.destroy', $cerpen->id) }}" method="POST"
                    onsubmit="return confirm(
              '{{ $cerpen->is_published ? 'Karya cerpen sudah dipublikasikan. Kamu yakin ingin menghapusnya?' : 'Karya cerpen masih draft. Kamu yakin ingin menghapusnya?' }}'
                );">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-trash mr-2"
                        style="font-size: 20px; color: rgb(255, 0, 0); font-family: 'Georgia', 'Times New Roman', serif;">
                        Delete
                    </button>
                </form>
            @endif
        </div>

    </div>
@endsection
