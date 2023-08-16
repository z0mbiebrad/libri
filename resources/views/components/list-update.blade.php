@php
    $book->list === 'current' ? ($list = 'finished') : ($list = 'current');
@endphp

<form action="{{ route('book.update', $book) }}" method="post" class="p-3 mx-2">
    @csrf
    <button type="submit"
        class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">{{ ucwords($list) }}
        Reading</button>
</form>
