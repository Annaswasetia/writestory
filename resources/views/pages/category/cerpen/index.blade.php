@extends('layouts.app') <!-- Menggunakan layout umum jika ada -->

@section('content')
<div class="container" style="margin-top: 110px;">
    <h1>Daftar Cerpen</h1>

    <a href="{{ route('pages.category.cerpen.index') }}" class="btn btn-get-started">Cerpen</a>

        <div class="row">
            @foreach($cerpen as $cerpen)
            <div class="col-md-4">
                <div class="card mb-4">
                    <!-- Gambar tidak ditampilkan -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $cerpen->title }}</h5>
                        <p class="card-text">{{ Str::limit($cerpen->content, 100) }}</p>
                        <a href="{{ route('cerpen.show', $cerpen->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
@endsection
