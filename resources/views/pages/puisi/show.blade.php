@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="card mb-4 shadow-lg" style="border-radius: 15px; background-color: #f8f9fa;">
        <div class="card-body p-5" style="position: relative;">

            <h1 class="card-title" style="font-family: 'Palatino', serif; color: #0f0f11; font-size: 2.8rem; text-shadow: 2px 2px 5px rgba(9, 211, 9, 0.5);">
                {{ $puisi->title }}
            </h1>
            
            <div class="d-flex justify-content-between">
                <p class="text-muted">
                    <small><strong>Ditulis oleh:</strong> {{ $puisi->user->name }}</small>
                </p>
                <p class="text-muted">
                    <small><strong>Kategori:</strong> {{ $puisi->category }}</small>
                </p>
            </div>

            <p class="text-muted">
                <small><strong>Diterbitkan pada:</strong> {{ $puisi->created_at->format('d M Y') }}</small>
            </p>
            
            <hr style="border-top: 2px solid #9dd99d;">
            
            <div style="font-family: 'Open Sans', sans-serif; line-height: 1.8; text-align: justify; background-color: #f0fff0; padding: 15px; border-radius: 10px;">
                <p class="text-dark">{!! nl2br(e($puisi->content)) !!}</p>
            </div>

            @if($puisi->is_published)
                <span class="badge bg-success" style="font-size: 1rem; position: absolute; top: 10px; right: 10px; padding: 10px 15px;">Diterbitkan</span>
            @else
                <span class="badge bg-warning" style="font-size: 1rem; position: absolute; top: 10px; right: 10px; padding: 10px 15px;">Draft</span>
            @endif
        </div>
    </div>

    <a href="{{ route('pages.puisi.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; font-size: 1rem; padding: 10px 20px; border-radius: 8px;">Kembali</a>
</div>
@endsection
