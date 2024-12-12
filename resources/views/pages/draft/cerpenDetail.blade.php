@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Draft</h1>
            <nav class="breadcrumbs">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                    <li style="margin-right: 8px;">
                        <a href="{{ route('pages.draft.index') }}"
                            style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Draft
                        </a>
                    </li>

                    <li style="color: #555; font-weight: bold;">
                        Draft Cerpen Detail
                    </li>
                </ol>

            </nav>
        </div>
    </div>
    <div class="container py-5">
        <!-- Judul Karya -->
        <h2 class="text-left" style="font-family: 'Georgia', serif; font-size: 3rem; color: #13a713;">
            {{ $karya->title }}
        </h2>
        <p class="text-left mb-4" style="font-family: 'Georgia', serif; font-size: 1.1rem; color: #777;">
            <strong>Kategori:</strong> {{ ucfirst($karya->category) }}
        </p>

        <p class="text-left mb-4" style="font-family: 'Georgia', serif; font-size: 1.1rem; color: #777;">
            <strong>Diterbitkan pada:</strong> {{ $karya->created_at->format('d M Y') }}
        </p>

        <!-- Konten Puisi/Cerpen -->
        <div class="card border-0">
            <div class="card-body">
                <div class="p-4 rounded bg-light"
                    style="font-family: 'Georgia', serif; font-size: 1.2rem; line-height: 1.8; color: #333; text-align: justify;">
                    {!! nl2br(e($karya->content)) !!}
                </div>
                <div class="mt-3">
                    <span class="badge bg-danger" style="font-weight: bold; font-size: 1rem;">Status: Draft</span>
                </div>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="d-flex justify-content-between mt-4">
            <!-- Tombol Back -->
            <a href="{{ route('pages.draft.index') }}" class="btn btn-outline-success rounded-pill shadow-sm px-4 py-2"
                style="font-size: 1rem; font-family: 'Georgia', serif;">
                <i class="bi bi-arrow-left"></i> Back
            </a>

            <!-- Tombol Update (Hanya untuk Admin atau Pemilik Karya) -->
            <div class="d-flex justify-content-end">
                <!-- Tombol Update (Hanya untuk Admin atau Pemilik Karya) -->
                @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->id === $karya->user_id))
                    <a href="{{ route('pages.draft.edit', $karya->id) }}"
                        class="btn btn-outline-secondary rounded-pill shadow-sm px-4 py-2 me-2"
                        style="font-size: 1rem; font-family: 'Georgia', serif;">
                        <i class="bi bi-pencil"></i> Update
                    </a>
                @endif

                <!-- Tombol Delete (Hanya untuk Admin atau Pemilik Karya) -->
                @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->id === $karya->user_id))
                    <form action="{{ route('pages.draft.destroy', $karya->id) }}" method="POST" style="display: inline;"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus cerpen ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-pill shadow-sm px-4 py-2"
                            style="font-size: 1rem; font-family: 'Georgia', serif;">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
