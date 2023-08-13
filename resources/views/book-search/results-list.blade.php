<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch></x-booksearch>
    @foreach ($books as $book)
        <div class="text-lg text-center border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
            <div class="pb-1 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                @if (Auth::user())
                    <div class="flex justify-around pt-4 pb-8">
                        {{-- <form class="p-2" action="{{ route('book.store') }}" method="POST" class="">
                            @csrf
                            <input type="hidden" name="finished_google_book_id" value="{{ $book->id }}"
                                class="flex items-center">
                            <button type="submit"
                                class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Finished</button>
                        </form> --}}
                        {{-- <form class="p-2" action="{{ route('addFinished') }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_google_book_id" value="{{ $book->id }}">
                            <button type="submit"
                                class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Current</button>
                        </form>
                        <form class="p-2" action="{{ route('addFinished') }}" method="POST">
                            @csrf
                            <input type="hidden" name="wishlist_google_book_id" value="{{ $book->id }}">
                            <button type="submit"
                                class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Wishlist</button>
                        </form> --}}
                    </div>
                    <a name="book" href="{{ route('results.show', $book) }}" class="0">
                        <p class="pb-6 underline">More information</p>
                        <img class="w-1/2 mx-auto mb-10 border rounded-sm lg:w-1/6 border-slate-300"
                            src="{{ $book[0]->thumbnail ?? url('/images/book.jpg') }}" alt="">
                    </a>
                @else
                    <a name="book" href="results/{{ $book }}" class="0">
                        <p class="pt-10 pb-6 underline">More information</p>
                        <img class="w-1/2 mx-auto mb-10 border rounded-sm lg:w-1/6 border-slate-300"
                            src="{{ $book[0]->thumbnail ?? url('/images/book.jpg') }}" alt="">
                    </a>
                @endif
            </div>
            @isset($book[0]->title)
                <h5 class="p-1 py-2 text-base underline border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book[0]->title }}</h5>
            @endisset
            @isset($book[0]->subtitle)
                <h5 class="p-1 py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book[0]->subtitle }}</h5>
            @endisset
            @isset($book[0]->authors)
                <h5 class="p-1 py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book[0]->authors }}</h5>
            @endisset
            @isset($book[0]->categories)
                <p class="p-1 py-2 text-base italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book[0]->categories }}</p>
            @endisset
            @isset($book[0]->published_date)
                <p class="p-1 py-2 text-base italic border rounded-md shadow-md border-slate-600 shadow-slate-600">Published
                    Date: {{ $book[0]->published_date }}</p>
            @endisset
        </div>
    @endforeach
</x-app-layout>
