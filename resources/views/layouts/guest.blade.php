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

<body class="font-sans antialiased text-white">
    <div class="min-h-screen bg-black">
        @include('layouts.navigation')

        <div
            class="px-6 py-4 mx-auto mt-6 overflow-hidden border rounded-lg shadow-md border-zinc-600 shadow-zinc-600 bg-zinc-900 sm:w-2/3 md:w-1/3">
            {{ $slot }}
        </div>
    </div>
</body>


<x-footer></x-footer>

</html>
