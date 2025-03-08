<form action="{{ route('book.destroy', $book) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit" value="delete" class="mx-auto italic">Delete
        Book</button>
</form>
