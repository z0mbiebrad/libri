<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300">
            {{ __('Finished Books') }}
        </h2>
    </x-slot>

    @foreach ($books as $book)
        <div class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">
            <a name="book" href="finished/{{ $book->id }}">
                <img class="w-1/2 mx-auto mb-4 border rounded-sm lg:w-1/6 border-slate-300"
                    src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
                <h5 class="p-1 underline">{{ $book->title ?? null }}</h5>
            </a>
            <h5 class="p-1 text-base">{{ $book->subtitle ?? null }}</h5>
            <h5 class="p-1 text-base">{{ $book->authors ?? null }}</h5>
            <p class="p-1 italic">{{ $book->categories ?? null }}</p>
            <p class="p-1 italic">Published Date: {{ $book->published_date ?? null }}</p>
            <p class="p-1 italic">Finished Reading: {{ date('d-m-Y', strtotime($book->created_at)) ?? null }}</p>
        </div>
    @endforeach
</x-app-layout>
