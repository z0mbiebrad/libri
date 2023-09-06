@php
    Request::is('results') ? ($href = 'results.show') : ($href = 'book.show');
@endphp

<a name="book" href="{{ route($href, $book) }}">
    <p class="pt-6 pb-6 underline">More information</p>
    <img class="w-1/2 mx-auto mb-4 border rounded-sm shadow-lg shadow-slate-700 lg:w-1/6 border-slate-700"
        src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
</a>
@isset($book->title)
    <h5 class="p-1 py-2 mx-auto text-base underline rounded-md">
        {{ $book->title }}</h5>
@endisset
@isset($book->subtitle)
    <h5 class="p-1 py-2 text-base rounded-md">
        {{ $book->subtitle }}</h5>
@endisset
@isset($book->authors)
    <h5 class="p-1 py-2 text-base rounded-md">
        {{ $book->authors }}</h5>
@endisset
@isset($book->categories)
    <p class="p-1 py-2 text-base italic rounded-md">
        {{ $book->categories }}</p>
@endisset
@isset($book->published_date)
    <p class="p-1 py-2 mb-4 text-base italic rounded-md">Published
        Date: {{ $book->published_date }}</p>
@endisset
