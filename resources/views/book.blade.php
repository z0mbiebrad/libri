<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300 ">
            {{ __('Book Search') }}
        </h2>
    </x-slot>

    <x-booksearch></x-booksearch>

    @if (!empty($finished))
        <div class="text-lg text-center text-slate-300"> {{ $finished }}</div>
    @endif
    @if (!empty($current))
        <div class="text-lg text-center text-slate-300"> {{ $current }}</div>
    @endif
    @if (!empty($wishlist))
        <div class="text-lg text-center text-slate-300"> {{ $wishlist }}</div>
    @endif

    <div>
        <a class="flex items-center my-3 text-lg font-semibold text-slate-300" href="{{ url()->previous() }}"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>Back</a>
        <div class="text-lg text-center border shadow-md text-slate-300 border-slate-800 shadow-slate-600">
            @if (Auth::user())
                <div class="flex justify-around">
                    <form class="p-2" action="{{ route('addFinished') }}" method="POST" class="">
                        @csrf
                        <input type="hidden" name="finished_google_book_id" value="{{ $book->id }}"
                            class="flex items-center">
                        <button type="submit"
                            class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Finished</button>
                    </form>
                    <form class="p-2" action="{{ route('addFinished') }}" method="POST">
                        @csrf
                        <input type="hidden" name="current_google_book_id" value="{{ $book->id }}">
                        <button type="submit"
                            class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Current</button>
                    </form>
                    <form class="p-2" action="{{ route('addFinished') }}" method="POST">
                        @csrf
                        <input type="hidden" name="wishlist_google_book_id" value="{{ $book->id }}">
                        <button type="submit"
                            class="flex items-center p-2 mx-auto border rounded-md shadow-md text-slate-300 border-slate-600 shadow-slate-600"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Wishlist</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="flex w-3/5 mx-auto font-semibold underline rounded-lg max-w-2/3 text-md">Login
                    to add to your book lists</a>
            @endif

            <img class="w-1/2 mx-auto my-6 border rounded-sm lg:w-1/6 border-slate-300"
                src="{{ $book->volumeInfo->imageLinks->thumbnail ?? url('/images/book.jpg') }}" alt="">
            @isset($book->volumeInfo->title)
                <h5 class="py-2 underline border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->title }}
                </h5>
            @endisset
            @isset($book->volumeInfo->subtitle)
                <h5 class="py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->subtitle }}
                </h5>
            @endisset
            @isset($book->volumeInfo->authors[0])
                <h5 class="py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->authors[0] }}
                </h5>
            @endisset
            @isset($book->volumeInfo->categories[0])
                <p class="py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    {{ $book->volumeInfo->categories[0] }}
                </p>
            @endisset
            @isset($book->volumeInfo->averageRating)
                <p
                    class="flex items-center justify-center py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
                    Rating:
                    <svg xmlns="http://www.w3.org/2000/svg" fill="gold" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>{{ $book->volumeInfo->averageRating }}
                </p>
            @endisset
            @isset($book->volumeInfo->publishedDate)
                <p class="py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">Published Date:
                    {{ $book->volumeInfo->publishedDate }}
                </p>
            @endisset
            <p class="py-5 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                {!! strip_tags($book->volumeInfo->description, '<b><br><i>') ?? 'Description not available.' !!}
            </p>
        </div>
    </div>
</x-app-layout>
