@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 150px;">
    <h1 class="text-center mb-4"
        style="font-size: 50px; color: rgb(117, 190, 117); font-family: 'Georgia', 'Times New Roman', serif;">
        <i class="bi bi-pencil" style="margin-right: 10px;"></i>Buat Karya Baru
    </h1>

    <form action="{{ route('karya.store') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf 

        <div class="row mb-4">
            <div class="col">
                <label for="title" class="form-label">Judul Karya <span class="text-danger">*</span></label>
                <input type="text" id="title" name="title" required placeholder="Masukkan judul karya"
                    value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">

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
                    style="resize: none; min-height: 100px; max-height: 300px; overflow-y: auto;">{{ old('content') }}</textarea>

                @error('content')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Auto-resize Textarea -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const contentArea = document.getElementById('content');

                contentArea.addEventListener('input', function() {
                    this.style.height = 'auto'; 
                    this.style.height = (this.scrollHeight) + 'px'; // Sesuaikan tinggi berdasarkan konten
                });
            });
        </script>

        
        <!-- Pilihan Kategori -->
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Kategori Karya <span class="text-danger">*</span></label>

                <div class="form-check">
                    <input type="radio" name="category" id="cerpen" value="cerpen" class="form-check-input" required 
                    {{ old('category') == 'cerpen' ? 'checked' : '' }}>
                    <label for="cerpen" class="form-check-label">Cerpen</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="category" id="puisi" value="puisi" class="form-check-input" required 
                    {{ old('category') == 'puisi' ? 'checked' : '' }}>
                    <label for="puisi" class="form-check-label">Puisi</label>
                </div>
            </div>
        </div>
        
        <!-- Checkbox untuk Publish Karya -->
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Publish Karya <span class="text-danger">*</span></label>
                <div class="form-check">
                    <input type="checkbox" name="is_published" id="is_published" value="1" class="form-check-input">
                    <label for="is_published" class="form-check-label">Publish Karya</label>
                </div>
            </div>
        </div>
        

        <!-- Tombol Submit dan Kembali -->
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-sm mb-3 rounded-pill shadow-lg bi-save-fill"
                style="font-size: 20px; color: rgb(23, 224, 23); font-family: 'Georgia', 'Times New Roman', serif;">Publish</button>

            <a href="{{ route('karya.index') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg bi-back"
                style="font-size: 20px; color: rgb(24, 46, 24); font-family: 'Georgia', 'Times New Roman', serif;">Back</a>
        </div>
    </form>

    <div class="text-center mt-3">
        <small class="text-muted">* Semua kolom yang ditandai dengan <span class="text-danger">*</span> adalah wajib diisi, jika tidak diisi otomatis aka kembali lagi ke halaman create.</small>
    </div>
</div>
@endsection


