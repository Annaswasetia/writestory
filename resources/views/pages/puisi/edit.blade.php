@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <!-- Pesan Sukses/Error -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h1 class="text-center mb-4"
            style="font-size: 50px; color: rgb(117, 190, 117); font-family: 'Georgia', 'Times New Roman', serif;">
            <i class="bi bi-pencil" style="margin-right: 10px;"></i>Edit Puisi
        </h1>

        <!-- Form untuk Edit Puisi berdasarkan id puisi yang ingin di perbarui-->
        <form action="{{ route('pages.puisi.update', $puisi->id) }}" method="POST" class="bg-light p-4 rounded shadow">
            @csrf 
            @method('PUT')

            <div class="row mb-4">
                <div class="col">
                    <label for="title" class="form-label">Judul Karya <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" required placeholder="Masukkan judul karya"
                        value="{{ old('title', $puisi->title) }}"
                        class="form-control @error('title') is-invalid @enderror">

                    @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="content" class="form-label">Konten Karya <span class="text-danger">*</span></label>
                    <textarea id="content" name="content" required placeholder="Masukkan konten karya"
                        class="form-control @error('content') is-invalid @enderror"
                        style="resize: none; min-height: 100px; max-height: 300px; overflow-y: auto; height: auto;">{{ old('content', $puisi->content) }}</textarea>

                    @error('content')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Auto-resize Textarea -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const contentArea = document.getElementById('content');

                    // Set height awal berdasarkan konten yang ada
                    contentArea.style.height = 'auto'; // Reset tinggi
                    contentArea.style.height = (contentArea.scrollHeight) + 'px'; // Sesuaikan tinggi berdasarkan konten

                    contentArea.addEventListener('input', function() {
                        this.style.height = 'auto'; // Reset tinggi
                        this.style.height = (this.scrollHeight) + 'px'; // Sesuaikan tinggi berdasarkan konten
                    });
                });
            </script>

            <select id="karya_id_disabled" required class="form-select" disabled>
                <option value="{{ $puisi->karya_id }}">{{ $puisi->karya->title }}</option>
            </select>

            <input type="hidden" name="karya_id" value="{{ $puisi->karya_id }}">

            <div class="row mb-4">
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" name="is_published" id="is_published" value="1" class="form-check-input"
                            {{ $puisi->is_published ? 'checked' : '' }} onclick="return false;">
                        <label for="is_published" class="form-check-label">Publish Karya</label>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit dan Kembali -->
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg bi-save"
                    style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">Save
                    Changes</button>

                <a href="{{ route('pages.puisi.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi-back"
                    style="font-size: 20px; color: rgb(24, 46, 24); font-family: 'Georgia', 'Times New Roman', serif;">Back</a>
            </div>
        </form>
    </div>
@endsection
