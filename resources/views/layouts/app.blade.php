<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    @stack('style')

</head>

<body class="text-white bg-black">
    <div class="wrapper">
        <!-- Include Navbar Component -->
        <x-navbar></x-navbar>

        <!-- Include Sidebar Component -->
        <x-sidebar>
            <x-slot:img>
                {{ auth()->user()->load('profile')->profile->profile_picture }}
            </x-slot:img>
            <x-slot:nama>
                {{ auth()->user()->name }}
            </x-slot:nama>
        </x-sidebar>
        {{-- @yield('sidebar') --}}

        <!-- Content -->
        <div class="content content-shifted" id="content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('scripts')


</body>

</html>
