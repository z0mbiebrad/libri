<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch />

    <div class="lg:grid lg:grid-cols-2 lg:gap-4">
        @foreach ($books as $book)
            <div
                class="w-5/6 -2 max-w-xs rounded-md mx-auto mb-6 text-lg border shadow-md bg-slate-900 text-slate-300 shadow-slate-600 border-slate-600 lg:mt-6 {{ $loop->iteration === 1 ? 'mt-6' : '' }} {{ $loop->odd ? 'lg:mr-6' : 'lg:ml-6' }}">
                @auth
                    <div x-data="{ show: false }" class="relative" @click.away="show = false">
                        <div @click="show = ! show" class="flex justify-center">
                            <button class="flex items-center py-2 mb-2 border-b-2">
                                Add to a list
                                <x-dropdown-icon />
                            </button>
                        </div>
                        <div x-show="show" style="display:none"
                            class="z-50 flex justify-around w-full px-4 py-2 mx-auto mt-2 mb-4 overflow-auto rounded-md lg:absolute bg-slate-800 text-slate-300 max-h-72">
                            @if (Auth::user())
                                <x-list-add name="finished" :book="$book" />
                                <x-list-add name="current" :book="$book" />
                                <x-list-add name="wishlist" :book="$book" />
                            @endif
                        </div>
                    </div>
                @else
                    <button class="flex mx-auto mt-4 mb-2 border-b-2">
                        <a href="{{ route('login') }}">
                            <p class="">Login to add to list</p>
                        </a>
                    </button>

                @endauth

                <x-list-view :book="$book" :loop="$loop" />

            </div>
        @endforeach
    </div>
</x-app-layout>
