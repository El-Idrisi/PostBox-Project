@extends('layouts.layout')

@section('title')
    Sign Up
@endsection

@section('content')
    <x-form class="card">
        <x-slot:title>
            Sign Up
        </x-slot:title>

        <x-slot:route>
            {{ route('register.submit') }}
        </x-slot:route>

        <x-input-name></x-input-name>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <x-input-email>
            Email
        </x-input-email>
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <x-input-password>
            <x-slot:title>
                Password
            </x-slot:title>
            <x-slot:id>
                password
            </x-slot:id>
            <x-slot:name>
                password
            </x-slot:name>
        </x-input-password>
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <x-input-password>
            <x-slot:title>
                Confirm Password
            </x-slot:title>
            <x-slot:id>
                password_confirmation
            </x-slot:id>
            <x-slot:name>
                password_confirmation
            </x-slot:name>
        </x-input-password>

        <x-button-submit>
            Sign Up
        </x-button-submit>

        <x-slot:haveLogin>
            Already have an account? <a href="{{ route('login') }}" onclick="goToLogin(event)">Login</a>
        </x-slot:haveLogin>
    </x-form>

    @push('style')
        <style>
            /* Animation Styles */
            .card {
                opacity: 0;
                transition: opacity 0.7s ease-in-out, transform 0.7s ease-in-out;
                transform: translateY(-30px);
            }

            .card.show {
                opacity: 1;
                transform: translateY(0);
            }

            .card.hide {
                opacity: 0;
                transform: translateY(30px);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function goToLogin(event) {
                event.preventDefault();
                const card = document.querySelector('.card');
                card.classList.add('hide');
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 700); // Match this duration to the CSS transition time
            }

            window.onload = function() {
                setTimeout(function() {
                    document.querySelector('.card').classList.add('show');
                }, 200); // Delay before showing the card on page load
            }
        </script>
    @endpush
@endsection
