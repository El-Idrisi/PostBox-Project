@extends('layouts.app')

@section('content')

<div class="stories-container">
    <h2 class="stories-header">Stories</h2>

    <!-- Cerita 1 -->
    <div class="story-card">
        <div class="story-header">
            <img src="https://via.placeholder.com/40" alt="User Profile">
            <div class="username">John Doe</div>
            <div class="timestamp">5 minutes ago</div>
        </div>
        <img src="https://via.placeholder.com/800x400" alt="Story Image" class="story-image">
        <div class="story-content">
            This is a story about my recent trip to the mountains. It was an amazing experience with lots of breathtaking views!
        </div>
        <div class="story-actions">
            <div class="like-dislike">
                <span class="like-icon">&#128077;</span> <!-- Emoji like -->
                <span>10 Likes</span>
            </div>
        </div>
        <div class="comment-section">
            <div class="comment">Jane: Looks amazing!</div>
            <div class="comment">Alice: Wow, I wish I were there!</div>
            <input type="text" class="comment-input" placeholder="Add a comment...">
            <button class="submit-comment">Post</button>
        </div>
    </div>

    <!-- Cerita 2 -->
    <div class="story-card">
        <div class="story-header">
            <img src="https://via.placeholder.com/40" alt="User Profile">
            <div class="username">Jane Smith</div>
            <div class="timestamp">10 minutes ago</div>
        </div>
        <img src="https://via.placeholder.com/800x400" alt="Story Image" class="story-image">
        <div class="story-content">
            I just baked my first batch of cookies! They turned out great, and I wanted to share the recipe with you all.
        </div>
        <div class="story-actions">
            <div class="like-dislike">
                <span class="like-icon">&#128077;</span> <!-- Emoji like -->
                <span>25 Likes</span>
            </div>
        </div>
        <div class="comment-section">
            <div class="comment">John: I want to try that recipe!</div>
            <div class="comment">Alice: Those look delicious!</div>
            <input type="text" class="comment-input" placeholder="Add a comment...">
            <button class="submit-comment">Post</button>
        </div>
    </div>

    <!-- Cerita lainnya -->
    <div class="story-card">
        <div class="story-header">
            <img src="https://via.placeholder.com/40" alt="User Profile">
            <div class="username">Alice</div>
            <div class="timestamp">30 minutes ago</div>
        </div>
        <img src="https://via.placeholder.com/800x400" alt="Story Image" class="story-image">
        <div class="story-content">
            Today, I decided to start a new hobby: painting. Here’s my first attempt, what do you think?
        </div>
        <div class="story-actions">
            <div class="like-dislike">
                <span class="like-icon">&#128077;</span> <!-- Emoji like -->
                <span>15 Likes</span>
            </div>
        </div>
        <div class="comment-section">
            <div class="comment">John: That's really good for a first attempt!</div>
            <div class="comment">Jane: Keep it up, you'll get even better!</div>
            <input type="text" class="comment-input" placeholder="Add a comment...">
            <button class="submit-comment">Post</button>
        </div>
    </div>
</div>
@endsection
