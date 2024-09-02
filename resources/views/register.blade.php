@extends('layouts.layout')

@section('title')
    Sign Up
@endsection

@section('content')
    <x-form>
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
        <x-input-email></x-input-email>
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
            <x-slot:type>
                password
            </x-slot:type>
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
            <x-slot:type>
                password
            </x-slot:type>
            <x-slot:name>
                password_confirmation
            </x-slot:name>
        </x-input-password>
        {{-- <x-input-confirm-password></x-input-confirm-password> --}}

        <x-button-submit>
            Sign Up
        </x-button-submit>

        <x-slot:haveLogin>
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </x-slot:haveLogin>
    </x-form>
@endsection
