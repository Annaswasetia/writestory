@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 150px;">
        <!-- Pesan Sukses/Error -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h1 class="text-center mb-4"
            style="font-size: 50px; color: rgb(117, 190, 117); font-family: 'Georgia', 'Times New Roman', serif;">
            <i class="bi bi-pencil" style="margin-right: 10px;"></i>Edit Cerpen
        </h1>

        <!-- Form untuk Edit Cerpen berdasarkan id cerpen yang ingiin di perbarui-->
        <form action="{{ route('pages.cerpen.update', $cerpen->id) }}" method="POST" class="bg-light p-4 rounded shadow">
            @csrf 
            @method('PUT')

            <div class="row mb-4">
                <div class="col">
                    <label for="title" class="form-label">Judul Karya <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" required placeholder="Masukkan judul karya"
                        value="{{ old('title', $cerpen->title) }}"
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
                        style="resize: none; min-height: 100px; max-height: 300px; overflow-y: auto; height: auto;">{{ old('content', $cerpen->content) }}</textarea>

                    @error('content')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Auto-resize Textarea -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const contentArea = document.getElementById('content');

                    
                    contentArea.style.height = 'auto';
                    contentArea.style.height = (contentArea.scrollHeight) + 'px'; 

                    contentArea.addEventListener('input', function() {
                        this.style.height = 'auto';
                        this.style.height = (this.scrollHeight) + 'px'; 
                    });
                });
            </script>

            <!-- Dropdown yang di-disable -->
            <select id="karya_id_disabled" required class="form-select" disabled>
                <option value="{{ $cerpen->karya_id }}">{{ $cerpen->karya->title }}</option>
            </select>

            <input type="hidden" name="karya_id" value="{{ $cerpen->karya_id }}">

            <!-- Checkbox untuk Publish Karya -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" name="is_published" id="is_published" value="1" class="form-check-input"
                            {{ $cerpen->is_published ? 'checked' : '' }} onclick="return false;">
                        <label for="is_published" class="form-check-label">Publish Karya</label>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit dan Kembali -->
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg bi-save"
                    style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">Save
                    Changes</button>

                <a href="{{ route('pages.cerpen.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi-back"
                    style="font-size: 20px; color: rgb(24, 46, 24); font-family: 'Georgia', 'Times New Roman', serif;">Back</a>
            </div>
        </form>
    </div>
@endsection
