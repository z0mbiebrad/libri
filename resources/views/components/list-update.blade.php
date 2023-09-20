@php
    $book->list === 'current' ? ($list = 'finished') : ($list = 'current');
@endphp

<form action="{{ route('book.update', $book) }}" method="post" class="">
    @csrf
    <button type="submit" class="px-2 text-lg underline text-slate-300">{{ ucwords($list) }}
        Reading</button>
</form>
