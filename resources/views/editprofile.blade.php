@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #1a1a1a; /* Background hitam */
        color: #f5f5f5; /* Warna teks yang lebih terang */
    }

    .edit-profile-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 1.5rem;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .edit-profile-header {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.5rem;
        border-radius: 8px;
        border: 1px solid #374151;
        background-color: #2d2d2d;
        color: #f5f5f5;
    }

    .form-group input:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .btn-save {
        width: 100%;
        padding: 0.75rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
        color: #ffffff;
        background-color: #3b82f6;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-save:hover {
        background-color: #2563eb;
    }
</style>

<div class="edit-profile-container">
    <h2 class="edit-profile-header">Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="John Doe">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="john@example.com">
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <input type="text" id="bio" name="bio" value="Web Developer">
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="New York, USA">
        </div>

        <button type="submit" class="btn-save">Save Changes</button>
    </form>
</div>
@endsection
