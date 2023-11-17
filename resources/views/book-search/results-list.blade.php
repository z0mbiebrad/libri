<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>



    @isset($books)
        <x-message />

        @if (Request::is('/results'))
            <x-booksearch />
        @endif

        @if (count($books) === 0)
            <p class="pt-4 pl-6">No books in this list, check back after adding!</p>
        @endif

        @if (Request::is('list/*'))
            <x-slot name="header">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __(ucwords(Str::of(Request::path())->substr(5)) . ' Books') }}
                </h2>
            </x-slot>
        @endif


        <div class="lg:grid lg:grid-cols-2 lg:gap-4">
            @foreach ($books as $book)
                <x-list-card :loop="$loop">

                    <x-list-view :book="$book" :loop="$loop" />

                </x-list-card>
            @endforeach
        </div>
    @else
        <p class="mt-2 text-xl text-center ">No results found, please try searching for something else!</p>
    @endisset

</x-app-layout>
