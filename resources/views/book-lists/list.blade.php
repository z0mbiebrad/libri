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

        <div class="lg:grid lg:grid-cols-2 lg:gap-4">
            @foreach ($books as $book)
                <x-list-card :loop="$loop">

                    <x-list-view :book="$book" :loop="$loop" />

                </x-list-card>
            @endforeach
        </div>
    @endif
</x-app-layout>
