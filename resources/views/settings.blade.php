@extends('layouts.app')

@section('content')

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
