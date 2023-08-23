@php
    Request::is('results') ? ($href = 'results.show') : ($href = 'book.show');
@endphp

<a name="book" href="{{ route($href, $book) }}" class="0">
    <p class="pt-6 pb-6 underline">More information</p>
    <img class="w-1/2 mx-auto mb-10 border rounded-sm shadow-lg shadow-slate-700 lg:w-1/4 border-slate-700"
        src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
</a>
@isset($book->title)
    <h5 class="p-1 py-2 text-base underline border rounded-md border-slate-800 ">
        {{ $book->title }}</h5>
@endisset
@isset($book->subtitle)
    <h5 class="p-1 py-2 text-base border rounded-md border-slate-800 ">
        {{ $book->subtitle }}</h5>
@endisset
@isset($book->authors)
    <h5 class="p-1 py-2 text-base border rounded-md border-slate-800 ">
        {{ $book->authors }}</h5>
@endisset
@isset($book->categories)
    <p class="p-1 py-2 text-base italic border rounded-md border-slate-800 ">
        {{ $book->categories }}</p>
@endisset
@isset($book->published_date)
    <p class="p-1 py-2 text-base italic border rounded-md border-slate-800 ">Published
        Date: {{ $book->published_date }}</p>
@endisset
