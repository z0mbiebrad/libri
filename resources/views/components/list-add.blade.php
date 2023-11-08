@php
    $bookSearch = request('bookSearch');
@endphp

<form class="p-2" action="{{ route('book.store', [$bookSearch, $name, $book]) }}" method="POST" class="">
    @csrf
    <input type="hidden" value="{{ $book }}" class="flex items-center">
    <button type="submit" class="mx-auto border-b-2">
        {{ ucwords($name) }}</button>
</form>
