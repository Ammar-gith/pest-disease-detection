<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="relative min-h-screen flex flex-col justify-center items-center">
        <!-- Background image -->
        <div class="absolute inset-0 bg-cover bg-center z-0"
            style="background-image: url('{{ asset('dist/img/bg-crop.jpg') }}');"></div>

        <!-- Green transparent overlay -->
        <div class="absolute inset-0 bg-green-800 opacity-40 z-10"></div>

        <!-- Logo on top-left -->
        <div class="absolute top-4 left-4 z-20">
            <img src="{{ asset('dist/img/dept-logo.png') }}" alt="Agriculture Dept Logo" class="h-16">
        </div>
        <!-- Content (your login / register form) -->
        <div class="relative z-20 w-full max-w-md bg-white bg-opacity-90 p-6 rounded shadow">
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>

</body>

</html>
