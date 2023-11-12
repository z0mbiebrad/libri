<form action="{{ route('book.destroy', $book) }}" method="post" class="p-2">
    @method('delete')
    @csrf
    <button type="submit" value="delete" class="mx-auto italic border-b-2">Delete
        Book</button>
</form>
