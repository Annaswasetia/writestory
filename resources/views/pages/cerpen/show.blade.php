@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="card-title" style="font-family: 'Palatino', serif; color: rgb(9, 29, 211); font-size: 2.5rem; text-shadow: 1px 1px 2px rgb(9, 211, 9);">{{ $cerpen->title }}</h1>
            <p class="text-muted">
                <small>Ditulis oleh: {{ $cerpen->user->name }} | Kategori: {{ $cerpen->category }}</small>
            </p>
            <p class="text-muted">
                <small>Diterbitkan pada: {{ $cerpen->created_at->format('d M Y') }}</small>
            </p>
            <hr>
            <p class="card-text">{{ $cerpen->content }}</p>
            
            @if($cerpen->is_published)
                <span class="badge bg-success">Diterbitkan</span>
            @else
                <span class="badge bg-warning">Draft</span>
            @endif
        </div>
    </div>

    <a href="{{ route('pages.cerpen.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
