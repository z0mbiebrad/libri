<form action="{{ route('book.destroy', $book) }}" method="post" class="">
    @method('delete')
    @csrf
    <button type="submit" value="delete" class="px-2 text-lg underline text-slate-300">Delete
        Book</button>
</form>
