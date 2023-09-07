<form action="{{ route('book.destroy', $book) }}" method="post" class="">
    @method('delete')
    @csrf
    <button type="submit" value="delete" class="w-1/2 text-lg text-slate-300">Delete
        Book</button>
</form>
