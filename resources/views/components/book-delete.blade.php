<form action="{{ route('book.destroy', $book) }}" method="post" class="p-3 mx-2">
    @method('delete')
    @csrf
    <button type="submit" value="delete"
        class="text-lg text-center border shadow-md py-7 text-slate-300 border-slate-800 shadow-slate-600">Delete
        Book</button>
</form>
