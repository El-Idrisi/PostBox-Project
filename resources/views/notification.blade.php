@extends('layouts.app')

@section('content')
<style>
    /* Styling untuk kontainer utama */
    .notification-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1rem;
        background-color: transparent;
        border-radius: 8px;
    }

    /* Styling untuk header halaman */
    .notification-header {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* Styling untuk setiap notifikasi */
    .notification-card {
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease;
    }

    .notification-card:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    /* Styling untuk ikon notifikasi */
    .notification-icon {
        font-size: 1.5rem;
        color: #ffffff;
        margin-right: 1rem;
    }

    /* Styling untuk teks notifikasi */
    .notification-text {
        font-size: 1rem;
        color: #ffffff;
    }

    /* Styling untuk waktu notifikasi */
    .notification-time {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        margin-left: auto;
    }
</style>

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