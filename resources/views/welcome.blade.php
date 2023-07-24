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
        <div class="absolute mb-56 text-center align-top">
            <h2 class="mb-2 text-3xl text-slate-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-10 m-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                Welcome to Libri!
            </h2>
            <p class="text-lg text-slate-300">A tool to help you organize your read and to-be-read lists
                effortlessly</p>
        </div>

        @if (Route::has('login'))
            <div
                class="px-10 py-8 border rounded-lg shadow-md border-slate-900 shadow-slate-400 bg-slate-800 text-slate-300">
                @auth
                    <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="p-1 text-xl font-semibold rounded-lg shadow-sm shadow-slate-900">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="p-1 ml-3 text-xl font-semibold rounded-lg shadow-sm shadow-slate-900">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
