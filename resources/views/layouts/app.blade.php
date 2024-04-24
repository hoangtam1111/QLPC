<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/responesive.css') }}">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/index.js') }}"></script>

    <style>
        .search {
            color: white;
        }

        .nav-item form button:hover {
            border: 1px solid #E02207;

        }

        .nav-item form button:hover i {
            color: #E02207;
        }

        .action-1 {
            background: #E02207;
            color: white;
            border: 1px solid #E02207;
        }

        .action-1:hover {
            background: white;
            color: #E02207;
            border: 1px solid #E02207;

        }

        .action-2 {
            background: white;
            color: #E02207;
            border: 1px solid #E02207;
        }

        .action-2:hover {
            background: #E02207;
            color: white;
        }
    </style>
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>
