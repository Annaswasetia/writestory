@extends('layouts.app')

@section('content')
    <div class="container py-5" style="margin-top: 100px;">
        <!-- Pesan Sukses/Error -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Judul Halaman -->
        <div class="text-center mb-5">
            <h1 class="display-4 text-success fw-bold">
                <i class="bi bi-pencil me-2"></i>Edit Draft dan Publish?
            </h1>
        </div>

        <!-- Form Edit Karya -->
        <form action="{{ route('pages.draft.update', $karya->id) }}" method="POST" class="shadow p-4 rounded bg-light">
            @csrf
            @method('PUT')

            <!-- Input Judul -->
            <div class="mb-3">
                <label for="title" class="form-label">Judul Karya</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $karya->title) }}"
                    placeholder="Masukkan judul karya" required>
            </div>

            <!-- Input Konten -->
            <div class="mb-3">
                <label for="content" class="form-label">Konten Karya</label>
                <textarea name="content" class="form-control" rows="10" placeholder="Tulis konten karya di sini" required>{{ old('content', $karya->content) }}</textarea>
            </div>

            <!-- Checkbox Publikasi -->
            <div class="form-check mb-3">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published"
                    {{ $karya->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Publikasikan Karya</label>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('pages.draft.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Back
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-1"></i>Update
                </button>
                <button type="submit" name="publish" value="1" class="btn btn-success">
                    <i class="bi bi-cloud-upload me-1"></i>Publikasikan
                </button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p class="text-secondary mt-2">Jika Anda ingin mempublish karya Anda centang checkbox Publikasikan Karya kemudian klik tombol "Publikasikan Karya".</p>
        </div>
    </div>
@endsection
