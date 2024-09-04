<div class="mb-5 card story-card">
    <div class="story-header">
        <img src="{{ asset('storage/' . $post->user->profile->profile_picture) }}" alt="User Profile">
        <div class="username">{{ $post->user->name }}</div>
        <div class="timestamp">{{ $post->created_at->diffForHumans() }}</div>
    </div>
    <div class="card-body">
        <h5 class="card-title text-start">{{ $post->title }}</h5>
        <p class="text-start card-text">{{ $post->content }}</p>
        @if ($post->image != null)
            <img class="story-image" src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
        @endif
        <div class="story-actions">
            <div class="like-dislike">
                <span class="like-icon">&#128077;</span> <!-- Emoji like -->
                <span>10 Likes</span>
            </div>
        </div>
        <div class="comment-section text-start">
            <div class="comment">Jane: Looks amazing!</div>
            <div class="comment">Alice: Wow, I wish I were there!</div>
            <input type="text" class="comment-input" placeholder="Add a comment...">
            <button class="submit-comment">Post</button>
        </div>
    </div>
</div>
