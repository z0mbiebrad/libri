<img class="w-1/2 mx-auto my-6 border shadow-lg shadow-slate-700 rounded-sm lg:w-1/6 border-slate-700"
    src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
@isset($book->title)
    <h5 class="py-2 underline border rounded-md shadow-md border-slate-800">
        {{ $book->title }}
    </h5>
@endisset
@isset($book->subtitle)
    <h5 class="py-2 text-base border rounded-md shadow-md border-slate-800">
        {{ $book->subtitle }}
    </h5>
@endisset
@isset($book->authors)
    <h5 class="py-2 text-base border rounded-md shadow-md border-slate-800">
        {{ $book->authors }}
    </h5>
@endisset
@isset($book->categories)
    <p class="py-2 italic border rounded-md shadow-md border-slate-800">
        {{ $book->categories }}
    </p>
@endisset
@isset($book->rating)
    <p class="flex items-center justify-center py-2 italic border rounded-md shadow-md border-slate-800">
        Rating:
        <svg xmlns="http://www.w3.org/2000/svg" fill="gold" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>{{ $book->rating }}
    </p>
@endisset
@isset($book->published_date)
    <p class="py-2 italic border rounded-md shadow-md border-slate-800">Published Date:
        {{ $book->published_date }}
    </p>
@endisset
<p class="py-5 text-base border rounded-md shadow-md border-slate-800">
    {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
</p>
