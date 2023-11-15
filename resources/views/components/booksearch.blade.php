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
        <div class="flex justify-center">
            <button
                class="w-1/3 py-2 text-center rounded-lg shadow-inner shadow-gray-300 hover:bg-slate-800 hover:shadow-white sm:w-1/4 md:w-1/5 lg:w-1/6">Search</button>
        </div>
    </form>
</div>
