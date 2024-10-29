@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Karya</h1>
            <nav class="breadcrumbs">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                    <li style="margin-right: 8px;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Home
                        </a>
                    </li>

                    <li style="color: #555; font-weight: bold;">
                        Karya
                    </li>
                </ol>


                <div class="py-3">
                    <a href="{{ url('/karya/create') }}" class="btn btn-sm mb-3 rounded-pill shadow-lg"
                        style="
                        font-size: 20px; 
                        color: white; 
                        font-family: 'Georgia', 'Times New Roman', serif; 
                        background-color: #75be75; 
                        padding: 10px 25px; 
                        text-shadow: 1px 1px 2px rgba(0,0,0,0.2); 
                        border: 2px solid #4fa94f;
                        border-radius: 50px; 
                        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
                        display: inline-block;">
                        <i class="bi bi-pencil" style="margin-right: 8px;"></i>
                        Buat Karya
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <section id="blog-posts" class="blog-posts section" style="background-color: #ffffff; padding: 50px 0;">
        <div class="container">
            <h1 style="font-family: 'Georgia', serif; color: #333; text-align: center; margin-bottom: 40px;">Halaman Karya</h1>
        
            <!-- Menampilkan Cerpen -->
            <h2 style="font-family: 'Georgia', serif; color: #4fa94f;">Cerpen</h2>
            @if ($cerpen->count() > 0)
                <div class="row">
                    @foreach ($cerpen as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm border-light"
                                style="border-radius: 15px; transition: transform 0.3s; position: relative;">
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="font-family: 'Palatino', serif; font-weight: bold; color: #0f0f11;">
                                        {{ $item->title }}
                                    </h5>
                                    <p class="text-muted">
                                        <small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small>
                                    </p>
                                    <p class="card-text" style="color: #666; font-style: italic;">
                                        {{ Str::limit($item->content, 100) }}
                                    </p>
                                    <a href="{{ route('pages.karya.show', $item->karya_id) }}" class="text-primary" style="text-decoration: none; font-weight: bold;">
                                        Baca Cerpen »
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Tidak ada cerpen yang tersedia.</p>
            @endif
        


            <hr style="border-top: 2px solid #919b91;">
            <!-- Menampilkan Puisi -->
            <h2 style="font-family: 'Georgia', serif; color: #4fa94f;">Puisi</h2>
            @if ($puisi->count() > 0)
                <div class="row">
                    @foreach ($puisi as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm border-light"
                                style="border-radius: 15px; transition: transform 0.3s; position: relative;">
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="font-family: 'Palatino', serif; font-weight: bold; color: #0f0f11;">
                                        {{ $item->title }}
                                    </h5>
                                    <p class="text-muted">
                                        <small>Ditulis pada: {{ $item->created_at->format('d M Y') }}</small>
                                    </p>
                                    <p class="card-text" style="color: #666; font-style: italic;">
                                        {{ Str::limit($item->content, 100) }}
                                    </p>
                                    <a href="{{ route('pages.karya.show', $item->karya_id) }}" class="text-primary" style="text-decoration: none; font-weight: bold;">
                                        Baca Puisi »
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Tidak ada puisi yang tersedia.</p>
            @endif
        </div>
    </section>
    
@endsection
