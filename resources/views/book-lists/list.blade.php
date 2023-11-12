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
            <x-list-card :loop="$loop">
                <div x-data="{ show: false }" class="">
                    <div @click="show = ! show" class="">
                        <button class="flex items-center py-2 mb-4 border-b-2">
                            <p class="">Book Options</p>
                            <x-dropdown-icon />
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
            </x-list-card>
        @endforeach
    @endif
</x-app-layout>
