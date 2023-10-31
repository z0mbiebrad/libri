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
                <div class="pt-4">
                    <div x-data="{ show: false }" @click.away="show = false" class="w-5/6 m-3 mx-auto">
                        <div @click="show = ! show" class="flex">
                            <button>
                                <p class="underline">Add to a list</p>
                            </button>
                        </div>
                        <div x-show="show" style="display:none" class="flex">
                            @if (Auth::user())
                                <x-list-add name="finished" :book="$book" />
                                <x-list-add name="current" :book="$book" />
                                <x-list-add name="wishlist" :book="$book" />
                            @endif
                        </div>
                    </div>

                </div>
            @endauth

            <x-list-view :book="$book" />

        </div>
    @endforeach
</x-app-layout>
