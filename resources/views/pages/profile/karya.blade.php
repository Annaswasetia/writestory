@extends('layouts.app')

@section('content')
<div class="page-title light-background" style="padding-top: 120px;">
    <div class="container">
        <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Profile</h1>
        <nav class="breadcrumbs">
            <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                <li style="margin-right: 8px;">
                    <a href="{{ route('profile') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                        Profile
                    </a>
                </li>

                <li style="color: #555; font-weight: bold;">
                    Semua Karya
                </li>
            </ol>

        </nav>
    </div>
</div>
<div class="container mt-5">
    <h1 class="mb-4" style="text-align: left; font-family: 'Palatino', serif; color: #343a40;">
        <i class="bi bi-journal-text"></i> Karya oleh <strong>{{ $user->name }}</strong>
    </h1>

    @if ($karya->isEmpty())
        <div class="alert alert-info text-center" role="alert" style="font-size: 1.2em;">
            Belum ada karya yang dibuat.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse; width: 100%; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <thead style="background-color: #007bff; color: white;">
                    <tr>
                        <th style="text-align: center; padding: 10px;">No</th>
                        <th style="padding: 10px;">Judul</th>
                        <th style="padding: 10px;">Isi Karya</th>
                        <th style="padding: 10px;">Kategori</th>
                        <th style="padding: 10px;">Status</th>
                        <th style="padding: 10px;">Dibuat</th>
                        <th style="padding: 10px;">Diperbarui</th>
                        <th style="text-align: center; padding: 10px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karya as $item)
                        <tr style="background-color: #f8f9fa;">
                            <td style="text-align: center; padding: 10px;">{{ $loop->iteration }}</td>
                            <td style="padding: 10px;">{{ $item->title }}</td>
                            <td style="padding: 10px;">{{ \Illuminate\Support\Str::limit($item->content, 100) }}</td>
                            <td style="padding: 10px;">{{ ucfirst($item->category) }}</td>
                            <td style="padding: 10px;">
                                @if ($item->is_published)
                                    <span style="color: green; font-weight: bold;">Published</span>
                                @else
                                    <span style="color: orange; font-weight: bold;">Draft</span>
                                @endif
                            </td>
                            <td style="padding: 10px;">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                            <td style="color: #ff6347; padding: 10px;">
                                @if ($item->created_at == $item->updated_at)
                                    -
                                @else
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}
                                @endif
                            </td>
                            <td style="text-align: center; padding: 10px;">
                                @if ($item->category == 'cerpen')
                                    <a href="{{ route('pages.cerpen.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                @elseif ($item->category == 'puisi')
                                    <a href="{{ route('pages.puisi.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="d-flex justify-content-start mt-4">
        <a href="{{ route('profile') }}" class="btn btn-secondary btn-sm" style="font-size: 1rem; font-weight: bold;">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
    </div>

</div>
@endsection