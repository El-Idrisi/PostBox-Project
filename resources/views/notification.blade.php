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
        </style>
    @endpush


    <div class="notification-container">
        <h2 class="notification-header">Notifications</h2>

        <x-notif-card>
            <x-slot:user>
                BudiJago
            </x-slot:user>
            <x-slot:timestamp>
                5 minutes ago
            </x-slot:timestamp>
        </x-notif-card>

    </div>
@endsection
