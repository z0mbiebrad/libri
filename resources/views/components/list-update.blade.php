@php
    $book->list === 'current' ? ($list = 'finished') : ($list = 'current');
@endphp

<form action="{{ route('book.update', $book) }}" method="post">
    @csrf
    <button type="submit" class="mx-auto italic">Move to {{ ucwords($list) }}</button>
</form>