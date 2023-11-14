<div class="w-full mx-auto my-1 shadow-md bg-slate-900 text-slate-300 shadow-slate-600">
    <form action="{{ route('results.show') }}" class="text-lg font-semibold">
        <label for="bookSearch" class="block w-full py-2 text-center"></label>

        <div class="flex justify-center text-black rounded-lg">
            <div class="flex items-center ml-2 space-x-2 text-slate-300">
                <input type="checkbox" id="epub" value="epub" name="epub"
                    {{ request('epub') === 'epub' ? 'checked' : '' }}>
                <label for="epub">Ebook</label>
                <input id="bookSearch" name="bookSearch" class="rounded-lg"
                    placeholder="{{ ucwords(request('bookSearch')) ?? 'Name of book...' }}" required>
                <input type="radio" id="intitle" value="intitle" name="searchBy"
                    {{ request('searchBy') === 'intitle' ? 'checked' : '' }} />
                <label for="intitle">Title</label>
                <input type="radio" id="inauthor" value="inauthor" name="searchBy"
                    {{ request('searchBy') === 'inauthor' ? 'checked' : '' }}>
                <label for="inauthor">Author</label>
            </div>
        </div>
        <button class="block w-full py-2">Search</button>
    </form>
</div>
