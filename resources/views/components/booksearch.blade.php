<div class="w-full mx-auto my-1 shadow-md bg-slate-900 text-slate-300 shadow-slate-600">
    <form action="{{ route('results.show') }}" class="text-lg font-semibold">
        <label for="bookSearch" class="block w-full py-2 text-center"></label>

        <div class="flex justify-center text-black rounded-lg">
            <input id="bookSearch" name="bookSearch" class="rounded-lg"
                placeholder="{{ ucwords(request('bookSearch')) ?? 'Name of book...' }}" required>
            <div class="flex items-center ml-2 space-x-2 text-slate-300">
                <input type="radio" id="intitle" value="intitle" name="searchBy" />
                <label for="intitle">Title</label>
                <input type="radio" id="inauthor" value="inauthor" name="searchBy">
                <label for="inauthor">Author</label>
            </div>
        </div>
        <button class="block w-full py-2">Search</button>
    </form>
</div>
