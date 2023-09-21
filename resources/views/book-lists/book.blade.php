<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300">
            {{ __(ucwords($book->list) . ' Book') }}
        </h2>
    </x-slot>

    @if (Session::has('message'))
        <div class="text-white alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif



    <div class="pt-2 text-lg border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
        <x-back-button :book="$book" />

        <div x-data="{ open: false }" class="mx-auto">
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-slate-300 focus:outline-none focus:bg-slate-800 focus:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>
                    <p class="">Book Options</p>
                </button>
            </div>
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                @if (Auth::user())
                    <x-book-delete :book="$book" />

                    <x-list-update :book="$book" />
                @endif
            </div>
        </div>

        <x-book-view :book="$book" />
    </div>
</x-app-layout>
