@extends('layouts.app')

@section('content')
    @push('style')
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

            .fa-check {
                transition: 300ms all
            }

            .fa-check:hover {
                color: #3b82f6;
            }
        </style>
    @endpush


    <div class="notification-container">

        {{-- {{ $notifications }} --}}
        <h2 class="notification-header">Notifications</h2>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($notifications as $notification)
            <div class="notification-card">
                <div class="notification-icon">🔔</div>
                <div class="notification-text">{{ $notification->follow->follower->name }} started following you.</div>
                <div class="notification-time">{{ $notification->created_at->diffForHumans() }}</div>
                <div class="ms-2 check">
                    <form action="{{ route('notifications.markAsRead', $notification) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-secondary fs-4 check">
                            <i class="fa-solid fa-check" title="Mark as Read"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach


    </div>
@endsection
