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
            }


            .like,
            .comment-link {
                display: flex;
                align-items: center;
            }

            .like a,
            .comment-link a {
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

            .like-icon:hover {
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
                background-color: #27272a;
                padding: 1rem;
                border-radius: 10px;

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

            .comment .user-time {
                display: flex;
                align-items: center;
                border-bottom: 1px solid #f5f5f5;
                padding-bottom: 1rem;
                /* justify-content: center; */
                /* justify-content: space-between; */
            }

            .comment .user-time img {
                width: 55px;
                height: 55px;
                border-radius: 50%;
                margin-right: 0.5rem;
            }

            .comment .user-time .user a {
                color: #f5f5f5;
                text-decoration: none;
                cursor: pointer;
                transition: 300ms all;
                font-weight: bold;
            }

            .comment .user a:hover {
                color: #3b82f6;
            }

            .comment .user-time .user .timestap {
                margin: 0 !important;
                font-weight: 200;
            }

            .comment-container p {
                padding: 1rem .5rem;
                margin: 0;
            }
        </style>
    @endpush

    <div class="stories-container">
        <h2 class="stories-header">Post</h2>
        <div class="mb-5 card story-card">
            <div class="story-header">
                <a href="{{ route('profile.show', $post->user->name) }}"
                    class="user d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/' . $post->user->profile->profile_picture) }}" alt="User Profile">
                    <div class="username">
                        {{ $post->user->name }}
                    </div>
                </a>
                <div class="timestamp">{{ $post->created_at->diffForHumans() }}</div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-start">{{ $post->title }}</h5>
                <p class="text-start card-text">{{ $post->content }}</p>
                @if ($post->image != null)
                    <img class="story-image" src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                @endif
                <div class="story-actions">
                    <div class="like">
                        <button class="text-white btn like-button" data-post-id="{{ $post->id }}">
                            <i class="fa-{{ $isLiked ? 'solid' : 'regular' }} fa-thumbs-up like-icon"></i>
                            <span class="likes-count">{{ $post->likes()->count() }}</span> Likes
                        </button>
                    </div>
                    <div class="comment-link">
                        <a href="{{ route('posts.show', $post) }}" class="text-white like">
                            <i class="fa-regular fa-comment me-2 like-icon"></i> <!-- Emoji like -->
                            <span>{{ $post->comments->count() }} Comments</span>
                        </a>
                    </div>


                </div>
                <div class="comment-section text-start">
                    @foreach ($post->comments as $comment)
                        <div class="comment">
                            <div class="user-time">
                                <img src="{{ asset('img/'. $comment->user->profile->profile_picture) }}" alt="">
                                <div class="user">
                                    <a class="user-comment"
                                        href="{{ route('profile.show', $comment->user->name) }}">{{ $comment->user->name }}:</a>
                                    <div class="timestap">Commented by on
                                        {{ $comment->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                            <div class="comment-container">
                                <p class="content">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach

                    <form action="{{ route('posts.comment', $post) }}" method="POST">
                        @csrf
                        <textarea class="comment-input" placeholder="Add a comment..." name="content"></textarea>
                        <button class="submit-comment">Post</button>
                    </form>
                </div>
            </div>
        </div>




    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.like-button').click(function() {
                    var postId = $(this).data('post-id');
                    var button = $(this);

                    $.ajax({
                        url: '/posts/' + postId + '/like',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                button.find('.likes-count').text(response.likes_count);
                                if (response.action === 'liked') {
                                    button.find('i').removeClass('fa-regular').addClass('fa-solid');
                                } else {
                                    button.find('i').removeClass('fa-solid').addClass('fa-regular');
                                }
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
