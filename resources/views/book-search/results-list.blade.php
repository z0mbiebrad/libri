<x-app-layout>
    @isset($books)

        <x-list-header :books="$books" />

        <x-message />

        <div class="">
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
