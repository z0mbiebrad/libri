@php
    $bookSearch = request('bookSearch');
@endphp

<form class="p-2" action="{{ route('book.store', [$bookSearch, $name, $book]) }}" method="POST" class="">
    @csrf
    <input type="hidden" value="{{ $book }}" class="flex items-center">
    <button type="submit" class="flex items-center p-2 mx-auto border-b-2 text-slate-300">
        {{ ucwords($name) }}</button>
</form>
