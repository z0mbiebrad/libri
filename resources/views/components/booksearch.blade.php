<div class="w-full mx-auto my-1 shadow-md bg-slate-900 text-slate-300 shadow-slate-600">
    <form action="{{ route('results') }}" class="text-lg font-semibold">
        <label for="bookSearch" class="block w-full py-2 text-center"></label>
        <input id="bookSearch" name="bookSearch" class="block w-3/5 mx-auto text-black rounded-lg"
            placeholder="Name of book..." required>
        <button class="block w-full py-2">Search</button>
    </form>
</div>
