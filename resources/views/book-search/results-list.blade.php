<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    @foreach ($books as $book)
        <div
            class=" w-11/12 px-3 mx-auto mb-6 text-lg border shadow-inner text-slate-300 shadow-slate-600 border-slate-600 lg:w-1/2 {{ $loop->iteration === 1 ? 'mt-6' : '' }}">
            @auth
                <div x-data="{ show: false }" class="">
                    <div @click="show = ! show" class="flex justify-center">
                        <button class="flex items-center py-2 mb-4 border-b-2">
                            Add to a list
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 pt-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="show" style="display:none" class="flex justify-around mb-4">
                        @if (Auth::user())
                            <x-list-add name="finished" :book="$book" />
                            <x-list-add name="current" :book="$book" />
                            <x-list-add name="wishlist" :book="$book" />
                        @endif
                    </div>
                </div>
            @else
                <button class="my-4 border-b-2">
                    <a href="{{ route('login') }}">
                        <p class="">Login to add to list</p>
                    </a>
                </button>

            @endauth

            <x-list-view :book="$book" :loop="$loop" />

        </div>
    @endforeach
</x-app-layout>
