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

            body {
                background-color: #1a1a1a;
                /* Background hitam */
                color: #f5f5f5;
                /* Warna teks yang lebih terang */
            }

            /* Kontainer utama */
            .stories-container {
                max-width: 800px;
                margin: 2rem auto;
                padding: 1rem;
                background-color: rgba(0, 0, 0, 0.6);
                /* Background semi-transparan */
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
                display: flex;
                flex-wrap: wrap;
                justify-content: center
            }

            /* Judul halaman */
            .stories-header {
                font-size: 1.5rem;
                font-weight: bold;
                color: #ffffff;
                /* Warna teks putih */
                margin-bottom: 1.5rem;
                text-align: center;
            }

            /* Kartu cerita */
            .story-card {
                background-color: rgba(255, 255, 255, 0.1);
                /* Background semi-transparan */
                border-radius: 12px;
                padding: 1rem;
                margin-bottom: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .story-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            /* Header cerita (profil pengguna dan waktu posting) */
            .story-header {
                display: flex;
                align-items: center;
                margin-bottom: 1rem;
            }

            .story-header img {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                margin-right: 1rem;
            }

            .story-header .username {
                font-weight: bold;
                color: #f5f5f5;
                text-decoration: none;
                transition: 300ms all
                /* Warna teks terang */
            }

            .story-header .user {
                text-decoration: none;

            }

            .story-header a.user:hover div {
                text-decoration: none;
                color: #3b82f6
            }

            .story-header .timestamp {
                font-size: 0.875rem;
                color: #cbd5e0;
                /* Warna teks lebih redup */
                margin-left: auto;
            }

            /* Gambar cerita */
            .story-image {
                width: 100%;
                /* height: 240px; */
                border-radius: 8px;
                margin-bottom: 1rem;
            }

            /* Teks cerita */
            .story-content {
                font-size: 1rem;
                color: #e2e8f0;
                /* Warna teks lebih terang */
                line-height: 1.6;
            }

            /* Bagian komentar dan like */
            .story-actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 1rem;
                width: 100%;
            }

            .like, .comment {
                display: flex;
                align-items: center;
            }

            .like a, .comment a {
                color: #f5f5f5;
                text-decoration: none;
                transition: 300ms all;
            }

            .like-icon {
                font-size: 1.5rem;
                cursor: pointer;
                margin-right: 0.5rem;
                transition: transform 0.3s ease;
            }

            .like-icon:hover{
                transform: scale(1.2);
            }

        </style>
    @endpush

    <div class="profile-container">
        <img src="{{ asset('img/' . $target['profile']['profile_picture']) }}" alt="User Profile" class="profile-image">
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
            @else
                @if ($isFollowing)
                    <form action="{{ route('profile.unfollow', $target->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-settings">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('profile.follow', $target->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-edit">Follow</button>
                    </form>
                @endif
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

    <div class="stories-container">
        <h2 class="stories-header">Stories</h2>

        @foreach ($posts as $post)
            @include('posts.load')
        @endforeach

        {{-- {{ $posts->links() }} --}}
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
