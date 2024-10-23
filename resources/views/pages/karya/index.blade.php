@extends('layouts.app')

@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1>Karya</h1>
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

    <section>
        <section>
            
        </section>
    </section>
@endsection
