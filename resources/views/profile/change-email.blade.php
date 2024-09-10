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

            .form-label {
                font-weight: bold;
                color: #f1f5f9;
            }

            .form-control {
                background-color: #2d2d2d;
                border: 1px solid #374151;
                color: #fff;
                border-radius: 10px;
            }

            .form-control:focus {
                box-shadow: none;
                border-color: #1e90ff;
            }

            .form-group .eye-icon {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
            }

            .input-group-text {
                background-color: transparent;
                border: none;
                cursor: pointer;
                color: #1e90ff;
            }

            .input-group-text:hover {
                color: #1c86ee;
            }

            a {
                color: #1e90ff;
            }

            a:hover {
                color: #1c86ee;
            }

            .inputpassword {
                border: none;
                background-color: transparent;
            }

            .inputpassword:focus {
                border: none;
                background-color: transparent;
            }
        </style>
    @endpush
    <div class="settings-container">
        {{-- {{ $user }} --}}
        <h2 class="settings-header">Change Email</h2>
        <form action="{{ route('profile.change_email', $user->name) }}" method="POST">
            @csrf
            {{-- @method('PUT') --}}

            <x-input-password>
                <x-slot:id>current_password</x-slot:id>
                <x-slot:title>Curent Password</x-slot:title>
                <x-slot:name>current_password</x-slot:name>
            </x-input-password>

            @error('current_password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <x-input-email>
                New Email
            </x-input-email>

            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror



            <x-button-submit>
                Change Password
            </x-button-submit>

        </form>
    </div>
@endsection
