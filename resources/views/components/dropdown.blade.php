<div x-data="{ open: false }" class="col-span-8 w-full pt-2 mt-4 mb-2 sm:px-4 border-t-2 border-zinc-700" @click.away="open = false">
    <div x-on:click="open = ! open">
        <div class="text-black underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-white pl-4 flex items-center gap-x-2 hover:cursor-pointer">
            Read description
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </svg>
        </div>
    </div>
    <div x-show="open" style="display:none" x-transition
        class="z-50 w-full px-4 mt-6 pb-2 overflow-auto rounded-md mx-auto bg-zinc-300 dark:bg-zinc-900 max-h-56">
        <div class="space-y-2 italic mt-2">
            @isset($book->published_date)
                <p class="max-w-lg text-pretty text-base">
                    {{ $book->published_date }}
                </p>
            @endisset
            <p class="not-italic">
                {!! strip_tags($book->description, '<b><br><i>') ?? 'Description not available.' !!}
            </p>
        </div>`
    </div>
</div>  