@extends('layouts.app')

@section('content')
    @push('style')
        <style>
            /* Styling untuk latar belakang */
            body {
                background-color: #1a1a1a;
                /* Background hitam */
                color: #f5f5f5;
                /* Warna teks yang lebih terang */
            }

            /* Kontainer utama profil */
            .profile-container {
                max-width: 600px;
                margin: 2rem auto;
                padding: 1rem;
                background-color: rgba(0, 0, 0, 0.6);
                /* Background semi-transparan */
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
                text-align: center;
            }

            /* Gambar profil */
            .profile-image {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                border: 3px solid #f5f5f5;
                /* Border putih untuk gambar profil */
                margin-bottom: 1rem;
            }

            /* Nama pengguna */
            .profile-username {
                font-size: 1.8rem;
                font-weight: bold;
                color: #ffffff;
                margin-bottom: 0.5rem;
            }

            /* Info tambahan (bio, lokasi, dll.) */
            .profile-info {
                font-size: 1rem;
                color: #d1d5db;
                /* Warna teks abu-abu terang */
                margin-bottom: 1.5rem;
            }

            /* Tombol aksi */
            .profile-actions {
                display: flex;
                justify-content: center;
                gap: 1rem;
            }

            .profile-actions button {
                padding: 0.5rem 1.5rem;
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn-edit {
                background-color: #3b82f6;
                /* Warna biru */
                color: #ffffff;
            }

            .btn-edit:hover {
                background-color: #2563eb;
                /* Warna biru lebih gelap saat hover */
            }

            .btn-settings {
                background-color: #4b5563;
                /* Warna abu-abu */
                color: #ffffff;
            }

            .btn-settings:hover {
                background-color: #374151;
                /* Warna abu-abu lebih gelap saat hover */
            }

            /* Kartu statistik */
            .profile-stats {
                display: flex;
                justify-content: space-between;
                margin-top: 2rem;
            }

            .stat-item {
                background-color: rgba(255, 255, 255, 0.1);
                /* Background semi-transparan */
                padding: 1rem;
                border-radius: 12px;
                width: 32%;
                text-align: center;
            }

            .stat-item h3 {
                font-size: 1.5rem;
                color: #ffffff;
                margin-bottom: 0.5rem;
            }

            .stat-item p {
                font-size: 1rem;
                color: #d1d5db;
            }
        </style>
    @endpush

    <div class="profile-container">
        <img src="{{ asset('storage/' . $target['profile']['profile_picture']) }}" alt="User Profile" class="profile-image">
        <h2 class="profile-username">{{ $target['name'] }}</h2>
        <p class="profile-info">{{ $target['profile']['bio'] }}</p>

        <div class="profile-actions">
            @if (Auth::id() === $target->id)
                <a href="{{ route('profile.edit', $target['name']) }}">
                    <button class="btn-edit">Edit Profile</button>
                </a>
                <a href="{{ route('profile.setting', $target['name']) }}">
                    <button class="btn-settings">Settings</button>
                </a>
            @endif
        </div>


        <div class="profile-stats">
            <div class="stat-item">
                <h3>{{ $postCount }}</h3>
                <p>Posts</p>
            </div>
            <div class="stat-item">
                <h3>{{ $followerCount }}</h3>
                <p>Followers</p>
            </div>
            <div class="stat-item">
                <h3>{{ $followingCount }}</h3>
                <p>Following</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Cool'
            })
        </script>
    @endif
@endpush
