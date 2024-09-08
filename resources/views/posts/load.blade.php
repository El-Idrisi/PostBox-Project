<div class="mb-5 card story-card">
    <div class="story-header">
        <a href="{{ route('profile.show', $post->user->name) }}"
            class="user d-flex justify-content-center align-items-center">
            <img src="{{ asset('storage/' . $post->user->profile->profile_picture) }}" alt="User Profile">
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
                    <i class="fa-{{ $post->isLikedBy(auth()->user()) ? 'solid' : 'regular' }} fa-thumbs-up like-icon"></i>
                    <span class="likes-count">{{ $post->likes()->count() }}</span> Likes
                </button>
            </div>
            <div class="comment">
                <a href="{{ route('posts.show', $post) }}" class="text-white like">
                    <i class="fa-regular fa-comment me-2 like-icon"></i> <!-- Emoji like -->
                    <span>{{ $post->comments->count() }} Comments</span>
                </a>
            </div>


        </div>
    </div>
</div>
