<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    @foreach ($books as $book)
        <div class="mx-auto text-lg border text-slate-300 border-slate-800 lg:w-1/2">
            @auth
                <div class="flex justify-around pt-4 pb-6">
                    <x-list-add name="finished" :book="$book" />
                    <x-list-add name="current" :book="$book" />
                    <x-list-add name="wishlist" :book="$book" />
                </div>
            @endauth

            <x-list-view :book="$book" />

        </div>
    @endforeach
</x-app-layout>
