<form action="{{ route('book.destroy', $book) }}" method="post" class="py-2">
    @method('delete')
    @csrf
    <button type="submit" value="delete" class="p-2 mx-auto border-b-2">Delete
        Book</button>
</form>
