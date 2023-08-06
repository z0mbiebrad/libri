<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch></x-booksearch>

    @foreach ($books as $book)
        <div class="text-lg text-center border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
            <div
                class="py-2 pt-16 pb-1 text-base underline border rounded-md shadow-md border-slate-600 shadow-slate-600">
                <a name="book" href="results/{{ $book->id }}" class="0">
                    <p class="pb-2 underline">Click here for more information.</p>
                    <img class="w-1/2 mx-auto mb-10 border rounded-sm lg:w-1/6 border-slate-300"
                        src="{{ $book->volumeInfo->imageLinks->thumbnail ?? url('/images/book.jpg') }}" alt="">
                </a>
            </div>
            @isset($book->volumeInfo->title)
                <h5 class="p-1 py-2 text-base underline border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->title }}</h5>
            @endisset
            @isset($book->volumeInfo->subtitle)
                <h5 class="p-1 py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->subtitle }}</h5>
            @endisset
            @isset($book->volumeInfo->authors[0])
                <h5 class="p-1 py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->authors[0] }}</h5>
            @endisset
            @isset($book->volumeInfo->categories[0])
                <p class="p-1 py-2 text-base italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->categories[0] }}</p>
            @endisset
            @isset($book->volumeInfo->publishedDate)
                <p class="p-1 py-2 text-base italic border rounded-md shadow-md border-slate-600 shadow-slate-600">Published
                    Date: {{ $book->volumeInfo->publishedDate }}</p>
            @endisset
        </div>
    @endforeach
</x-app-layout>
