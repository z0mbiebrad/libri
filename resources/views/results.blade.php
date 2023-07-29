<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch></x-booksearch>

    <div>
        @foreach ($books as $book)
            <div class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">
                <a name="book" href="results/{{ $book->id }}">
                    <img class="w-1/2 mx-auto mb-4 border rounded-sm lg:w-1/6 border-slate-300"
                        src="{{ $book->volumeInfo->imageLinks->thumbnail ?? url('/images/book.jpg') }}" alt="">
                    <h5 class="p-1 underline">{{ $book->volumeInfo->title ?? null }}</h5>
                </a>
                <h5 class="p-1 text-base">{{ $book->volumeInfo->subtitle ?? null }}</h5>
                <h5 class="p-1 text-base">{{ $book->volumeInfo->authors[0] ?? null }}</h5>
                <p class="p-1 italic">{{ $book->volumeInfo->categories[0] ?? null }}</p>
                <p class="p-1 italic">Published Date: {{ $book->volumeInfo->publishedDate ?? null }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
