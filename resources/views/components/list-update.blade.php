@php
    $book->list === 'current' ? ($list = 'finished') : ($list = 'current');
@endphp

<form action="{{ route('book.update', $book) }}" method="post" class="">
    @csrf
    <button type="submit" class="p-2 mx-auto border-b-2">Move to {{ ucwords($list) }}</button>
</form>
