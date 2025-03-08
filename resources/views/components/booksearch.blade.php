<div class="mx-auto border-slate-600 p-2 bg-zinc-800" x-data="{ bookSearch: '' }">
    <form action="{{ route('results.show') }}"
        class="text-lg font-semibold text-center text-black rounded-lg flex items-center justify-center">
        <input id="bookSearch" name="bookSearch" class="rounded-lg md:w-1/3"
            placeholder="{{ ucwords(request('bookSearch')) ?: 'Name of book...' }}" required x-model="bookSearch">
        <button x-show="bookSearch.length > 0" x-transition class="py-2 text-center text-neutral-200 hover:cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="search" class="w-full rounded-sm border border-neutral-300 bg-neutral-50 py-2 pl-10 pr-2 text-[16px] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white" name="bookSearch" placeholder="Search for a book" aria-label="search"/>
        </div>
    </form>
</div>
