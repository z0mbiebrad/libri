<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto my-1 shadow-md bg-slate-900 text-slate-300 shadow-slate-600">
        <form action="{{ route('results') }}" class="text-lg font-semibold">
            <label for="bookSearch" class="block w-full py-2 text-center"></label>
            <input id="bookSearch" name="bookSearch" class="block w-3/4 mx-auto text-black rounded-lg"
                placeholder="Name of book...">
            <button class="block w-full py-2">Search</button>
        </form>
    </div>
    <div>
        @foreach ($books as $book)
            <div class="border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
                <p class="">{{ $book->volumeInfo->title }}</p>
                <p> Description: {{ @$book->volumeInfo->description }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
