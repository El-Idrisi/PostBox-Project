@extends('layouts.app')

@section('content')
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
</style>

<div class="settings-container">
    <h2 class="settings-header">Settings</h2>

    <form action="{{ route('settings.update') }}" method="POST">
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
    </form>
</div>
@endsection
