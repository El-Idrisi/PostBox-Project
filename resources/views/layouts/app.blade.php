<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('Home') }}">Home</a></li>
                <li><a href="{{ route('fresh') }}">Explore</a></li>
                <li><a href="{{ route('notification') }}">Notifications</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
