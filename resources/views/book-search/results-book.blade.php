<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    @if (session('status'))
        <div class="ml-2 alert alert-success text-slate-300">
            {{ session('status') }}
        </div>
    @endif

    <div>

        <x-back-button :book="$book" />

        <div class="text-lg border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
            @auth
                <div class="flex justify-around">
                    <x-list-add name="finished" :book="$book" />
                    <x-list-add name="current" :book="$book" />
                    <x-list-add name="wishlist" :book="$book" />
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="flex justify-center w-3/5 p-2 mx-auto font-semibold underline rounded-lg max-w-2/3 text-md">Login
                    to add to your book lists
                </a>
            @endauth

            <x-book-view :book="$book" />

        </div>
    </div>
</x-app-layout>
