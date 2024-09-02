@extends('layouts.app')

@section('content')

<div class="post-container">
    <h2>Create a New Post</h2>

    <!-- Form untuk membuat post baru -->
    <form>
        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" id="image">
        </div>

        <!-- Caption -->
        <div class="form-group">
            <label for="caption">Caption:</label>
            <input type="text" id="caption" placeholder="Enter your caption here">
        </div>

        <!-- Story -->
        <div class="form-group">
            <label for="story">Story:</label>
            <textarea id="story" placeholder="Write your story here"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="button" class="post-button">Post</button>
        </div>
    </form>
</div>
@endsection
