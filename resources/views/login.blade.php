@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <x-form>
        <x-slot:title>
            Login
        </x-slot:title>

        <x-slot:route>
            {{ route('login.submit') }}
        </x-slot:route>

        <x-input-email></x-input-email>
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
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </x-slot:haveLogin>

        @error('email')
            <p class="mt-3 text-center text-danger">
                {{ $message }}
            </p>
        @enderror
        <p class="mt-3 text-center">
    </x-form>
@endsection
