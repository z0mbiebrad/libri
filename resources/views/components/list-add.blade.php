{{-- @php
    $bookSearch = request('bookSearch');
@endphp
@dd($bookSearch)

<form class="p-2" action="{{ route('book.store', [$bookSearch, $name, $book]) }}" method="POST" class="">
    @csrf
    <input type="hidden" value="{{ $book }}" class="flex items-center">
    <button type="submit">
        {{ ucwords($name) }}</button>
</form> --}}
