<div class="mx-auto border-b shadow-inner border-slate-600 bg-slate-900 shadow-slate-600">
    <form action="{{ route('results.show') }}" class="text-lg font-semibold">
        <div class="pt-4 mx-auto text-center text-black rounded-lg">
            <input id="bookSearch" name="bookSearch" class="w-1/2 rounded-lg lg:w-1/3"
                placeholder="{{ ucwords(request('bookSearch')) ?: 'Name of book...' }}" required>
            @auth
                <div class="flex items-center justify-center pt-2 space-x-2 text-center text-white">
                    <input type="checkbox" id="epub" value="epub" name="epub"
                        {{ request('epub') === 'epub' ? 'checked' : '' }}>
                    <label for="epub">Ebook</label>
                    <input type="radio" id="intitle" value="intitle" name="searchBy"
                        {{ request('searchBy') === 'intitle' ? 'checked' : '' }} />
                    <label for="intitle">Title</label>
                    <input type="radio" id="inauthor" value="inauthor" name="searchBy"
                        {{ request('searchBy') === 'inauthor' ? 'checked' : '' }}>
                    <label for="inauthor">Author</label>
                </div>
            @endauth
        </div>
        <button class="block w-full py-2">Search</button>
    </form>
</div>
