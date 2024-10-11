@extends('layouts.app') <!-- Menggunakan layout umum jika ada -->

@section('content')
    <div class="container" style="margin-top: 110px;">
        <h1>Daftar Puisi</h1>

        <a href="{{ route('pages.puisi.index') }}" class="btn btn-get-started">Puisi</a>

        <div class="row">
            @foreach ($puisi as $puisi)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- Gambar tidak ditampilkan -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $puisi->title }}</h5>
                            <p class="card-text">{{ Str::limit($puisi->content, 100) }}</p>
                            <a href="{{ route('puisi.show', $puisi->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
