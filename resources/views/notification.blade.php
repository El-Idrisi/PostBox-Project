@extends('layouts.app')

@section('content')
<style>
    /* Styling untuk kontainer utama */
    .notification-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1rem;
        background-color: #f9fafb;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Styling untuk header halaman */
    .notification-header {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333333;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* Styling untuk setiap notifikasi */
    .notification-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease;
    }

    .notification-card:hover {
        background-color: #edf2f7;
    }

    /* Styling untuk ikon notifikasi */
    .notification-icon {
        font-size: 1.5rem;
        color: #3182ce;
        margin-right: 1rem;
    }

    /* Styling untuk teks notifikasi */
    .notification-text {
        font-size: 1rem;
        color: #2d3748;
    }

    /* Styling untuk waktu notifikasi */
    .notification-time {
        font-size: 0.875rem;
        color: #a0aec0;
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
