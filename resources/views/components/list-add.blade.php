@php
    $bookSearch = request('bookSearch');
@endphp

<form class="p-2" action="{{ route('book.store', [$bookSearch, $name, $book]) }}" method="POST" class="">
    @csrf
    <input type="hidden" value="{{ $book }}" class="flex items-center">
    <button type="submit" class="flex items-center p-2 mx-auto text-slate-300"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        {{ ucwords($name) }}</button>
</form>
