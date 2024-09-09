@extends('layouts.layout')

@section('title')
    Login
@endsection

@section('content')
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

    <x-form class="card">
        <x-slot:title>
            Login
        </x-slot:title>

        <x-slot:route>
            {{ route('login.submit') }}
        </x-slot:route>

        <x-input-email>
            Email
        </x-input-email>
        <x-input-password>
            <x-slot:title>
                Password
            </x-slot:title>
            <x-slot:id>
                password
            </x-slot:id>
            <x-slot:type>
                password
            </x-slot:type>
            <x-slot:name>
                password
            </x-slot:name>
        </x-input-password>
        <x-button-submit>
            Login
        </x-button-submit>

        <x-slot:haveLogin>
            Don't have an account? <a href="{{ route('register') }}" onclick="goToRegister(event)">Register</a>
        </x-slot:haveLogin>

        @error('email')
            <p class="mt-3 text-center text-danger">
                {{ $message }}
            </p>
        @enderror
    </x-form>
    @push('scripts')
        <script>
            function goToRegister(event) {
                event.preventDefault();
                const card = document.querySelector('.card');
                card.classList.add('hide');
                setTimeout(function() {
                    window.location.href = "{{ route('register') }}";
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
