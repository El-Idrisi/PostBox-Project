@extends('layouts.app')

@section('content')
    @push('style')
        <style>
            body {
                background-color: #1a1a1a;
                color: #f5f5f5;
            }

            .settings-container {
                max-width: 600px;
                margin: 2rem auto;
                padding: 1.5rem;
                background-color: rgba(0, 0, 0, 0.6);
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            }

            .settings-header {
                font-size: 1.5rem;
                font-weight: bold;
                margin-bottom: 1.5rem;
                text-align: center;
            }

            .settings-option {
                margin-bottom: 1rem;
            }

            .settings-option label {
                font-weight: bold;
                display: block;
                margin-bottom: 0.5rem;
            }

            .settings-option input[type="checkbox"] {
                margin-right: 0.5rem;
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

            .list-group-item a {
                text-decoration: none;
                color: #f5f5f5;
            }


            .card-body:hover {
                background-color: #495057;
                border-radius: 5px;
                transition: 300ms all;
            }
        </style>
    @endpush

    <div class="settings-container">
        <h2 class="settings-header">Settings</h2>

        {{-- <form action="{{ route('settings.update') }}" method="POST">
            @csrf

            <div class="settings-option">
                <label>
                    <input type="checkbox" name="notifications" checked>
                    Enable Notifications
                </label>
            </div>

            <div class="settings-option">
                <label>
                    <input type="checkbox" name="dark_mode">
                    Enable Dark Mode
                </label>
            </div>

            <button type="submit" class="btn-save">Save Settings</button>
        </form> --}}
        <div class="accordion " id="account-settings">
            <x-accordion>
                <x-slot:id>account-setting</x-slot:id>
                <x-slot:target>pass-and-email</x-slot:target>
                <x-slot:title><i class="fa-regular fa-user"></i> <span class="ms-2">Account Settings</span></x-slot:title>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('profile.show_change_password', $user->name) }}"><i class="fa fa-key"></i> <span
                                class="ms-2">Change Password</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('profile.show_change_email', $user->name) }}"><i class="fa fa-envelope"></i> <span class="ms-2">Change E-Mail</span></a>
                    </li>
                </ul>

        </div>
        </x-accordion>

        <div class="mt-2 card">
            <div class="card-body">
                <a href="{{ route('profile.show_delete', $user->name) }}" class="link-underline-opacity-0 link-offset-2 link-underline text-danger delete-account">
                    <i class="fa-solid fa-trash"></i> Delete Account
                </a>
            </div>
        </div>
    </div>
@endsection
