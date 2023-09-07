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

    <div class="flex">
        <x-list-update :book="$book" />

    </div>

    <div class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">
        <x-book-delete :book="$book" />

        <x-book-view :book="$book" />
    </div>
</x-app-layout>
