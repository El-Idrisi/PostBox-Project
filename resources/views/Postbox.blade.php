@extends('layouts.app')

@section('content')
<style>
    /* Styling untuk form */
    .post-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .post-container h2 {
        font-size: 1.75rem;
        font-weight: bold;
        color: #333333;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #4A5568;
        margin-bottom: 0.5rem;
    }

    .form-group input[type="file"],
    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #E2E8F0;
        border-radius: 4px;
        background-color: #F7FAFC;
        color: #2D3748;
    }

    .form-group input[type="file"]::file-selector-button {
        border: 1px solid #E2E8F0;
        padding: 0.5rem;
        border-radius: 4px;
        background-color: #EDF2F7;
        color: #2D3748;
        cursor: pointer;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .post-button {
        display: inline-block;
        background-color: #3182CE;
        color: #FFFFFF;
        font-weight: bold;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .post-button:hover {
        background-color: #2B6CB0;
    }
</style>

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
        <div class="form-group text-right">
            <button type="button" class="post-button">Post</button>
        </div>
    </form>
</div>
@endsection
