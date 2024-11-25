@extends('layouts.app')
@section('content')
    <div class="page-title light-background" style="padding-top: 120px;">
        <div class="container">
            <h1 style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: bold; color: #0dc225;">Profile</h1>
            <nav class="breadcrumbs">
                <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">

                    <li style="margin-right: 8px;">
                        <a href="{{ route('home') }}" style="text-decoration: none; color: #4fa94f; font-weight: bold;">
                            Home
                        </a>
                    </li>

                    <li style="color: #555; font-weight: bold;">
                        Profile Admin
                    </li>
                </ol>

            </nav>
        </div>
    </div>



    <div class="profile-section py-5">
        <div class="container">
            <!-- Pesan Sukses, di atas profile-card dan memiliki lebar yang sama -->
            @if (session('success'))
                <div class="alert alert-success mb-4 profile-card">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Profile Card -->
            <div class="profile-card bg-white p-4 shadow-sm rounded border hover-shadow">
                <h2 class="font-serif font-weight-bold text-dark">Admin Profile</h2>

                <!-- Button to show users -->
                <button id="showUsersButton" class="btn btn-primary mt-3">Show User</button>

                <!-- User List (hidden by default) -->
                <div id="userList" class="mt-4" style="display: none;">
                    <h3 class="font-weight-bold">Users Logged In</h3>

                    <!-- Tabel Daftar Pengguna -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                @if ($user->role !== 'admin' && $user->name !== 'test user')
                                    <!-- Menyembunyikan admin dan test user -->
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <!-- Button Delete User (hanya bisa dilakukan oleh admin) -->
                                            @if (Auth::user()->role == 'admin')
                                                <!-- Hanya admin yang bisa menghapus -->
                                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Daftar Karya yang Dipublikasikan -->
        <div class="container my-5">
            <h2 class="text-left mb-4 font-Times New Roman font-weight-bold text-primary">
                <i class="bi bi-bookmark-check"></i> Daftar Karya yang Dipublikasikan
            </h2>            
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Tanggal Diperbarui</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karya as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ ucfirst($item->category) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    @if ($item->created_at->eq($item->updated_at))
                                        <span>-</span> <!-- Tanggal belum diperbarui -->
                                    @else
                                        <span class="text-success">{{ $item->updated_at->format('d M Y') }}</span> <!-- Tanggal diperbarui dengan warna hijau -->
                                    @endif
                                </td>
                                <td>
                                    @if ($item->category === 'cerpen')
                                        <a href="{{ route('pages.cerpen.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">Detail</a>
                                    @elseif($item->category === 'puisi')
                                        <a href="{{ route('pages.puisi.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">Detail</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada karya yang dipublikasikan</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
        // Toggle visibility of user list when button is clicked
        document.getElementById('showUsersButton').addEventListener('click', function() {
            var userList = document.getElementById('userList');
            if (userList.style.display === 'none') {
                userList.style.display = 'block';
            } else {
                userList.style.display = 'none';
            }
        });
    </script>
@endSection
