<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-300">
            {{ __('Finished Books') }}
        </h2>
    </x-slot>

    <form action="{{ route('deleteFinishedBook', $book) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" value="delete"
            class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">Delete
            Book</button>
    </form>

    <div class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">
        <img class="w-1/2 mx-auto mb-6 border rounded-sm lg:w-1/6 border-slate-300"
            src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
        @isset($book->title)
            <h5 class="py-2 underline border rounded-md shadow-md border-slate-600 shadow-slate-600">
                {{ $book->title }}
            </h5>
        @endisset
        @isset($book->subtitle)
            <h5 class="py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                {{ $book->subtitle }}
            </h5>
        @endisset
        @isset($book->authors)
            <h5 class="py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
                {{ $book->authors }}
            </h5>
        @endisset
        @isset($book->categories)
            <p class="py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
                {{ $book->categories }}
            </p>
        @endisset
        @isset($book->averageRating)
            <p
                class="flex items-center justify-center py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
                Rating:
                <svg xmlns="http://www.w3.org/2000/svg" fill="gold" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>{{ $book->averageRating }}
            </p>
        @endisset
        @isset($book->published_date)
            <p class="py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">Published Date:
                {{ $book->published_date }}
            </p>
        @endisset
        <p class="py-2 italic border rounded-md shadow-md border-slate-600 shadow-slate-600">Finished Reading:
            {{ date('d-m-Y', strtotime($book->created_at)) }}</p>
        <p class="py-5 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
            {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
        </p>
    </div>
</x-app-layout>
