@php
    $book = $books->first();
@endphp

<x-app-layout>

    <x-message />

    @if ($books->isEmpty())
        <p class="pt-4 pl-6 text-slate-300">No books in this list, check back after adding!</p>
    @else
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-slate-300">
                {{ __(ucwords($book->list) . ' Books') }}
            </h2>
        </x-slot>

        @foreach ($books as $book)
            <div
                class="w-11/12 px-3 mx-auto mb-6 text-lg border shadow-inner text-slate-300 shadow-slate-600 border-slate-600 lg:w-1/2 {{ $loop->iteration === 1 ? 'mt-6' : '' }}">
                <div x-data="{ show: false }" class="">
                    <div @click="show = ! show" class="">
                        <button class="flex items-center py-2 mb-4 border-b-2">
                            <p class="">Book Options</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="show" style="display:none" class="flex items-center justify-around mb-4">
                        @if (Auth::user())
                            <x-book-delete :book="$book" />
                            <x-list-update :book="$book" />
                        @endif
                    </div>
                </div>
                <x-list-view :book="$book" :loop="$loop" />
            </div>
        @endforeach
    @endif
</x-app-layout>
