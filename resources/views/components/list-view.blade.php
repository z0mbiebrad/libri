<a name="book" href="{{ route('results.show', $book) }}" class="0">
    <p class="pt-6 pb-6 underline">More information</p>
    <img class="w-1/2 mx-auto mb-10 border rounded-sm lg:w-1/6 border-slate-300"
        src="{{ $book->thumbnail ?? url('/images/book.jpg') }}" alt="">
</a>
@isset($book->title)
    <h5 class="p-1 py-2 text-base underline border rounded-md shadow-md border-slate-600 shadow-slate-600">
        {{ $book->title }}</h5>
@endisset
@isset($book->subtitle)
    <h5 class="p-1 py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
        {{ $book->subtitle }}</h5>
@endisset
@isset($book->authors)
    <h5 class="p-1 py-2 text-base border rounded-md shadow-md border-slate-600 shadow-slate-600">
        {{ $book->authors }}</h5>
@endisset
@isset($book->categories)
    <p class="p-1 py-2 text-base italic border rounded-md shadow-md border-slate-600 shadow-slate-600">
        {{ $book->categories }}</p>
@endisset
@isset($book->published_date)
    <p class="p-1 py-2 text-base italic border rounded-md shadow-md border-slate-600 shadow-slate-600">Published
        Date: {{ $book->published_date }}</p>
@endisset
