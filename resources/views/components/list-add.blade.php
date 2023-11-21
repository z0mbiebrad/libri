@php
    $bookSearch = request('bookSearch');
@endphp

<form class="p-2" action="{{ route('book.store', [$bookSearch, $name, $book]) }}" method="POST" class="">
    @csrf
    <input type="hidden" value="{{ $book }}" class="flex items-center">
    <button type="submit" class="px-1 mx-auto italic border-b border-gray-200">
        {{ ucwords($name) }}</button>
</form>
