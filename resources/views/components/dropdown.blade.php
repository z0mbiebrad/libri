<div x-data="{ open: false }" class="col-span-8 w-full py-2 mt-4 mb-2 pl-3 border-t-2 border-zinc-700" @click.away="open = false">
    <div x-on:click="open = ! open">
        <div class="font-medium text-black underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-white">
            {{ $trigger }}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
            stroke-width="2.5" aria-hidden="true" class="inline size-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
        </svg>
        </div>
    </div>
    <div x-show="open" style="display:none" x-transition
        class="z-50 w-full px-4 pb-2 overflow-auto rounded-md -mx-auto bg-zinc-800 max-h-56">
        {{ $content }}
    </div>
</div>
