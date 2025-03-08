<div x-data="{ open: false }" class="col-span-8 w-full pt-2 mt-4 mb-2 sm:px-4 border-t-2 border-zinc-700" @click.away="open = false">
    <div x-on:click="open = ! open">
        <div class="font-medium text-black underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-white pl-4">
            {{ $trigger }}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
            stroke-width="2.5" aria-hidden="true" class="inline size-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
        </svg>
        </div>
    </div>
    <div x-show="open" style="display:none" x-transition
        class="z-50 w-full px-4 mt-6 pb-2 overflow-auto rounded-md mx-auto bg-zinc-300 dark:bg-zinc-900 max-h-56">
        {{ $content }}
    </div>
</div>  