@extends('layouts.app')

@section('content')

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
