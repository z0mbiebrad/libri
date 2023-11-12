@php
    $book->list === 'current' ? ($list = 'finished') : ($list = 'current');
@endphp

<form action="{{ route('book.update', $book) }}" method="post" class="p-2">
    @csrf
    <button type="submit" class="mx-auto italic border-b-2">Move to {{ ucwords($list) }}</button>
</form>
