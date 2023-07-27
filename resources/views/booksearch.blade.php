<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto my-1 shadow-md bg-slate-900 text-slate-300 shadow-slate-600">
        <form action="{{ route('results') }}" class="text-lg font-semibold">
            @csrf
            <label for="bookSearch" class="block w-full py-2 text-center"></label>
            <input id="bookSearch" name="bookSearch" class="block w-3/4 mx-auto text-black rounded-lg"
                placeholder="Name of book...">
            <button class="block w-full py-2">Search</button>
        </form>
    </div>

    <div>
        @if (!empty($books))
            @foreach ($books as $book)
                <a name="book" href="{{ $book->id }}">
                    <div
                        class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">
                        <img class="w-1/2 mx-auto mb-4 border rounded-sm lg:w-1/6 border-slate-300"
                            src="{{ $book->volumeInfo->imageLinks->thumbnail ?? url('/images/book.jpg') }}"
                            alt="">
                        <h5 class="p-1 underline">{{ $book->volumeInfo->title ?? null }}</h5>
                        <h5 class="p-1 text-base">{{ $book->volumeInfo->subtitle ?? null }}</h5>
                        <h5 class="p-1 text-base">{{ $book->volumeInfo->authors[0] ?? null }}</h5>
                        <p class="p-1 italic">{{ $book->volumeInfo->categories[0] ?? null }}</p>
                        <p class="p-1 italic">Published Date: {{ $book->volumeInfo->publishedDate ?? null }}</p>
                        {{-- <p class="pt-1 text-base">{{ @$book->volumeInfo->description }}</p> --}}
                    </div>
                </a>
            @endforeach

        @endif
    </div>
</x-app-layout>
