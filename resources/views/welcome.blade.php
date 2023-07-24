<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="flex flex-wrap items-center justify-center min-h-screen bg-black">
        <div class="absolute mb-56 text-center align-top text-slate-300">
            <h2 class="mb-2 text-3xl">
                <x-application-logo></x-application-logo>
                Welcome to Libri <span class="-ml-2.5 font-mono font-extrabold">!</span>
            </h2>
            <p class="mb-2 text-lg">A tool to help you organize and track your books effortlessly.</p>
            <p class="mb-12 text-lg">Happy reading!</p>
        </div>

        @if (Route::has('login'))
            <div
                class="px-10 py-8 border rounded-lg shadow-md border-slate-900 shadow-slate-600 bg-slate-900 text-slate-300">
                @auth
                    <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="p-1 text-xl font-semibold underline rounded-lg decoration-slate-600">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="p-1 ml-3 text-xl font-semibold underline rounded-lg decoration-slate-600">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
