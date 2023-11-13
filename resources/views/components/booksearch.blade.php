<div class="w-full mx-auto my-1 shadow-md bg-slate-900 text-slate-300 shadow-slate-600">
    <form action="{{ route('results.show') }}" class="text-lg font-semibold">
        <label for="bookSearch" class="block w-full py-2 text-center"></label>

        <div class="flex justify-center text-black rounded-lg">
            <input id="bookSearch" name="bookSearch" class="rounded-l-lg"
                placeholder="{{ ucwords(request('bookSearch')) ?? 'Name of book...' }}" required>
            <select class="rounded-r-lg" id="filter" name="filter" required focus>
                <option value="intitle">Title</option>
                <option value="inauthor">Author</option>
            </select>
        </div>
        <button class="block w-full py-2">Search</button>
    </form>
</div>
