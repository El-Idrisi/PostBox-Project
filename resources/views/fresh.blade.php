@extends('layouts.app')

@section('content')
    <style>
        /* Styling untuk latar belakang */
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
            padding: 20px;
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
            /* Warna teks terang */
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
        }

        .like-dislike {
            display: flex;
            align-items: center;
        }

        .like-icon,
        .dislike-icon {
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 0.5rem;
            transition: transform 0.3s ease;
        }

        .like-icon:hover,
        .dislike-icon:hover {
            transform: scale(1.2);
        }

        .comment-section {
            margin-top: 1rem;
            border-top: 1px solid #cbd5e0;
            padding-top: 1rem;
        }

        .comment {
            margin-bottom: 0.5rem;
            color: #f5f5f5;
        }

        .comment-input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 8px;
            border: 1px solid #cbd5e0;
            background-color: rgba(0, 0, 0, 0.3);
            color: #f5f5f5;
        }

        .submit-comment {
            margin-top: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .submit-comment:hover {
            background-color: #0069d9;
        }
    </style>

    <div class="stories-container">


        <h2 class="stories-header">Fresh</h2>

        @foreach ($freshPosts as $post)
            {{-- <x-post-card :user="$post->user->name" :user_pp="$post->user->profile->profile_picture ?? 'default-avatar.png'" :img="$post->image ?? 'default-post-image.jpg'" :desc="$post->content">
                <x-slot name="user_pp">
                    {{ $post->user->profile->profile_picture }}
                </x-slot>
                <x-slot name="user">
                    {{ $post->user->name }}
                </x-slot>
                @if ($post->image != null)
                    <x-slot name="img">
                        <img class="story-image" src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                    </x-slot>
                @else
                    <x-slot name="img">

                    </x-slot>
                @endif
                <x-slot name="title">
                    {{ $post->title }}
                </x-slot>
                <x-slot name="desc">
                    {{ $post->content }}
                </x-slot>
                <x-slot name="timestamp">
                    {{ $post->created_at->diffForHumans() }}
                </x-slot>
            </x-post-card> --}}

            @include('posts.load')
        @endforeach

    </div>
@endsection


