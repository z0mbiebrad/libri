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
                class="w-11/12 px-3 mx-auto mb-6 text-lg border shadow-inner text-slate-300 shadow-slate-600 border-slate-600 lg:w-1/2">
                <div x-data="{ show: false }" @click.away="show = false" class="m-3">
                    <div @click="show = ! show" class="flex items-center">
                        <button
                            class="inline-flex items-center justify-center transition duration-150 ease-in-out rounded-md text-slate-300 focus:outline-none focus:bg-slate-800 focus:text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                            <p class="">Book Options</p>
                        </button>
                    </div>
                    <div x-show="show" style="display:none">
                        @if (Auth::user())
                            <x-book-delete :book="$book" />

                            <x-list-update :book="$book" />
                        @endif
                    </div>
                </div>
                <x-list-view :book="$book" />
            </div>
        @endforeach
    @endif
</x-app-layout>
