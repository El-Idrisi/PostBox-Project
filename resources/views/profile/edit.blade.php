@extends('layouts.app')

@section('content')
@push('style')
    <style>
        body {
            background-color: #1a1a1a;
            /* Background hitam */
            color: #f5f5f5;
            /* Warna teks yang lebih terang */
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
@endpush

    {{-- {{ $user }} --}}

    <div class="edit-profile-container">
        <h2 class="edit-profile-header">Edit Profile</h2>

        <form action="{{ route('profile.update', $user['name']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/png,image/jpeg,image/jpg,image/webp">
            </div>

            @error('profile_picture')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $user['name'] }}">
            </div>

            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ $user['profile']['username'] }}">
            </div>
            @error('username')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label>Gender</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                    {{ $user['profile']['gender'] == 'Male' ? 'checked' : '' }}>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female"
                    {{ $user['profile']['gender'] == 'Female' ? 'checked' : '' }}>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>

            @error('gender')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="bio">Bio</label>
                <input type="text" id="bio" name="bio" value="{{ $user['profile']['bio'] }}">
            </div>

            @error('bio')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="birth_of_day">Birth Day</label>
                <input type="date" id="birth_of_day" name="birth_of_day" value="{{ $user['profile']['birth_of_day'] }}">
            </div>

            @error('birth_of_day')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn-save">Save Changes</button>
        </form>
    </div>
@endsection
