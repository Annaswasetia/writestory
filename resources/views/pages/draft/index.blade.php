@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px; background-color: #f5f5f5;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Draft Karya</h1>
            <nav class="breadcrumbs">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">
                    <li style="margin-right: 8px;">
                        <a href="{{ route('karya.index') }}"
                            style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Karya
                        </a>
                    </li>
                    <li style="color: #555; font-weight: bold;">
                        Draft
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container py-5">
        <!-- Header -->
        <h2 class="text-center mb-4"
            style="font-family: 'Georgia', serif; font-weight: bold; font-size: 2.5rem; 
            color: #0368ff; text-transform: uppercase; letter-spacing: 1px; 
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
            <i class="bi bi-journal-text" style="font-size: 2.5rem; margin-right: 10px;"></i>
            Daftar Draft Karya
        </h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Jika Tidak Ada Draft -->
        @if ($drafts->isEmpty())
            <div class="alert alert-warning d-flex align-items-center justify-content-center text-center" role="alert"
                style="border-radius: 15px; padding: 20px; background-color: #fff3cd; max-width: 600px; margin: 0 auto;">
                <i class="bi bi-file-earmark-x-fill mr-3" style="font-size: 2rem; color: #ffc107;"></i>
                <span style="font-size: 1.2rem;">
                    <strong>Oops!</strong> Belum ada draft yang dibuat. Yuk, buat karya kamu!
                </span>
            </div>
        @else
            <!-- Menampilkan Draft -->
            <div class="row">
                @foreach ($drafts as $draft)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm bg-light h-100"
                            style="border-radius: 15px; overflow: hidden; border: 1px solid #dcdcdc;">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="font-weight: bold; color: #0dc225; text-transform: capitalize; font-size: 1.2rem;">
                                    {{ $draft->title }}
                                </h5>
                                <p class="card-text text-muted" style="font-size: 0.9rem;">
                                    <strong>Kategori:</strong> {{ ucfirst($draft->category) }}
                                </p>
                                <p class="card-text" style="font-size: 0.95rem; color: #333;">
                                    {{ Str::limit($draft->content, 100) }}
                                </p>
                                <a href="{{ route('pages.draft.show', $draft->id) }}"
                                    class="btn btn-primary btn-sm shadow-sm rounded-pill px-3">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Tombol Back -->
        <div class="text-start mt-4">
            <a href="{{ route('profile') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi bi-arrow-left-circle mr-2"
                style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">
                Back
            </a>
        </div>
    </div>

@endsection
