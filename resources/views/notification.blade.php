@extends('layouts.app')

@section('content')

<div class="notification-container">
    <h2 class="notification-header">Notifications</h2>

    <!-- Notifikasi 1 -->
    <div class="notification-card">
        <div class="notification-icon">🔔</div>
        <div class="notification-text">You have a new message from John Doe.</div>
        <div class="notification-time">5 minutes ago</div>
    </div>

    <!-- Notifikasi 2 -->
    <div class="notification-card">
        <div class="notification-icon">🔔</div>
        <div class="notification-text">Your post has been liked by Jane Smith.</div>
        <div class="notification-time">10 minutes ago</div>
    </div>

    <!-- Notifikasi 3 -->
    <div class="notification-card">
        <div class="notification-icon">🔔</div>
        <div class="notification-text">Alice commented on your photo.</div>
        <div class="notification-time">30 minutes ago</div>
    </div>

    <!-- Tambahan notifikasi lainnya -->
    <div class="notification-card">
        <div class="notification-icon">🔔</div>
        <div class="notification-text">Bob started following you.</div>
        <div class="notification-time">1 hour ago</div>
    </div>

</div>
@endsection
