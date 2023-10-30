@php
    Request::is('results') ? ($href = 'results.show') : ($href = 'book.show');
@endphp

<div class="w-5/6 mx-auto">
    <a name="book" href="{{ route($href, $book) }}">
        <p class="pt-6 pb-6 text-center underline">More information</p>
        <img class="w-full mb-4 border rounded-sm shadow-lg shadow-slate-700 lg:w-1/6 border-slate-700"
            src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
    </a>
    @isset($book->title)
        <h5 class="py-2 text-base underline">
            {{ $book->title }}</h5>
    @endisset
    @isset($book->published_date)
        <p class="py-2 text-base italic">
            {{ $book->published_date }}
        </p>
    @endisset
    @isset($book->subtitle)
        <h5 class="py-2 text-base">
            {{ $book->subtitle }}</h5>
    @endisset
    @isset($book->authors)
        <h5 class="py-2 text-base">
            {{ $book->authors }}</h5>
    @endisset
    @isset($book->categories)
        <p class="py-2 mb-4 text-base italic">
            {{ $book->categories }}</p>
    @endisset
</div>
