<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    <x-message />

    <div class="lg:grid lg:grid-cols-2 lg:gap-4">
        @foreach ($books as $book)
            <x-list-card :loop="$loop">
                @auth
                    <div x-data="{ show: false }" class="relative" @click.away="show = false">
                        <x-dropdown-trigger>
                            Add to List
                        </x-dropdown-trigger>
                        <div x-show="show" style="display:none"
                            class="z-50 flex justify-around w-full px-4 py-2 mx-auto mt-2 mb-4 overflow-auto rounded-md lg:absolute bg-slate-800 text-slate-300 max-h-72">
                            @if (Auth::user())
                                <x-list-add name="finished" :book="$book" />
                                <x-list-add name="current" :book="$book" />
                                <x-list-add name="wishlist" :book="$book" />
                            @endif
                        </div>
                    </div>
                @else
                    <button class="flex mx-auto mt-4 mb-2 border-b-2">
                        <a href="{{ route('login') }}">
                            <p class="">Login to add to list</p>
                        </a>
                    </button>

                @endauth

                <x-list-view :book="$book" :loop="$loop" />

            </x-list-card>
        @endforeach
    </div>
</x-app-layout>
