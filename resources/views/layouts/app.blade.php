<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-white bg-zinc-900">
    @if (Request::routeIs('booksearch'))
    <img src="{{ asset('images/books.jpg') }}" alt="" class="absolute inset-0 object-cover w-full h-full -z-50 opacity-15">
    @endif

    <div class="min-h-screen bg-cover bg-no-repeat bg-center">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="border-b shadow-inner shadow-zinc-600 border-zinc-600 bg-zinc-900">
                <div class="px-4 py-2 mx-auto sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

<x-footer></x-footer>

</html>
