<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300">
            {{ __('Current Reading List') }}
        </h2>
    </x-slot>

    @if (Session::has('message'))
        <div class="text-white alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif
    @foreach ($books as $book)
        <div class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">
            <a name="book" href="current/{{ $book->id }}">
                <img class="w-1/2 mx-auto mb-4 border rounded-sm lg:w-1/6 border-slate-300"
                    src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
                @isset($book->title)
                    <h5 class="p-1 underline">{{ $book->title }}</h5>
                @endisset
            </a>
            @isset($book->subtitle)
                <h5 class="p-1 text-base">{{ $book->subtitle }}</h5>
            @endisset
            @isset($book->authors)
                <h5 class="p-1 text-base">{{ $book->authors }}</h5>
            @endisset
            @isset($book->categories)
                <p class="p-1 italic">{{ $book->categories }}</p>
            @endisset
            @isset($book->publishedDate)
                <p class="p-1 italic">Published Date: {{ $book->publishe_date }}</p>
            @endisset
        </div>
    @endforeach
</x-app-layout>
