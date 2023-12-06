<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ $title ?? 'Title' }}
    </title>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Common File -->
    <link id="pagestyle" href="{{ mix('/css/material-dashboard.css') }}" rel="stylesheet" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <!-- CSS for each Page -->
    @yield('assets')

    <!-- JS Common File -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- JS for each Page -->
    @yield('script')
</head>

<body class="g-sidenav-show  bg-gray-200">
    <div id="toast"></div>

    @include('admin.layouts.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        @include('admin.layouts.nav_bar')

        <div id="app">
            @yield('content')
        </div>

    </main>
</body>

</html>
