<div class="mx-auto border-slate-600 p-4 bg-zinc-200 dark:bg-zinc-800 shadow-lg">
    <form action="{{ route('results.show') }}"
        class="text-lg font-semibold text-center text-black rounded-lg flex items-center justify-center">
        <div class="relative flex w-full max-w-md flex-col gap-1 text-neutral-600 dark:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50"> 
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="search" class="w-full rounded-sm border border-neutral-300 bg-neutral-50 py-2 pl-10 pr-2 text-base focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white" name="bookSearch" placeholder="Search for a book" aria-label="search"/>
        </div>
    </form>
</div>
