@php
    $book = $books->first();
@endphp
<x-app-layout>
    @if ($books->isEmpty())
        <p class="pt-4 pl-6 text-slate-300">No books in this list, check back after adding!</p>
    @else
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-slate-300">
                {{ __(ucwords($book->list) . ' Books') }}
            </h2>
        </x-slot>

        @foreach ($books as $book)
            <div class="container mx-auto text-lg border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
                <x-list-view :book="$book" />
            </div>
        @endforeach
    @endif
</x-app-layout>
