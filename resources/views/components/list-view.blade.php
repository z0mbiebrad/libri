@php
    Request::is('results') ? ($href = 'results.show') : ($href = 'book.show');
@endphp

<a name="book" href="{{ route($href, $book) }}">
    <p class="pt-6 pb-6 text-center underline">More information</p>
    <img class="w-1/2 mx-auto mb-4 border rounded-sm shadow-lg shadow-slate-700 lg:w-1/6 border-slate-700"
        src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
</a>
@isset($book->title)
    <h5 class="w-1/2 py-2 mx-auto text-base underline">
        {{ $book->title }}</h5>
@endisset
@isset($book->subtitle)
    <h5 class="w-1/2 py-2 mx-auto text-base">
        {{ $book->subtitle }}</h5>
@endisset
@isset($book->authors)
    <h5 class="w-1/2 py-2 mx-auto text-base">
        {{ $book->authors }}</h5>
@endisset
@isset($book->categories)
    <p class="w-1/2 py-2 mx-auto text-base italic">
        {{ $book->categories }}</p>
@endisset
@isset($book->published_date)
    <p class="w-1/2 py-2 mx-auto mb-4 text-base italic">Published: {{ $book->published_date }}</p>
@endisset
