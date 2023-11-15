@php
    $book = $books->first();
@endphp

<x-app-layout>

    <x-message />

    @if ($books->isEmpty())
        <p class="pt-4 pl-6">No books in this list, check back after adding!</p>
    @else
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __(ucwords($book->list) . ' Books') }}
            </h2>
        </x-slot>

        @foreach ($books as $book)
            <x-list-card :loop="$loop">
                <div x-data="{ show: false }" class="">
                    <x-dropdown-trigger>
                        Book Options
                    </x-dropdown-trigger>

                    <x-dropdown-links>
                        <x-book-delete :book="$book" />
                        <x-list-update :book="$book" />
                    </x-dropdown-links>
                </div>
                <x-list-view :book="$book" :loop="$loop" />
            </x-list-card>
        @endforeach
    @endif
</x-app-layout>
