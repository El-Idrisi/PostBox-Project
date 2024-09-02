@extends('layouts.app')

@section('content')

<div class="profile-container">
    <img src="https://via.placeholder.com/120" alt="User Profile" class="profile-image">
    <h2 class="profile-username">John Doe</h2>
    <p class="profile-info">Web Developer • New York, USA</p>

    <div class="profile-actions">
    <a href="{{ route('editprofile') }}">
        <button class="btn-edit">Edit Profile</button>
    </a>
    <a href="{{ route('settings') }}">
        <button class="btn-settings">Settings</button>
    </a>
</div>


    <div class="profile-stats">
        <div class="stat-item">
            <h3>150</h3>
            <p>Posts</p>
        </div>
        <div class="stat-item">
            <h3>300</h3>
            <p>Followers</p>
        </div>
        <div class="stat-item">
            <h3>180</h3>
            <p>Following</p>
        </div>
    </div>
</div>
@endsection
