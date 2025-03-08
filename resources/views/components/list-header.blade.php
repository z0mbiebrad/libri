@if (Request::is('list/*'))
<div class="dark:shadow-zinc-600 dark:border-zinc-600 dark:bg-zinc-800">
    <div class="px-4 py-2 mx-auto sm:px-6 lg:px-8 flex justify-between items-center max-w-sm">
            <a 
                href="{{ route('list.index', ['list' => 'finished']) }}" 
                @class([
                    'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                    'font-bold text-black dark:text-white underline' => Request::is('list/finished'),
                    'font-light text-neutral-600 dark:text-neutral-300' => !Request::is('list/finished'),
                    ])
            >
                Finished
            </a>
            <a 
                href="{{ route('list.index', ['list' => 'current']) }}" 
                @class([
                    'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                    'font-bold text-black dark:text-white underline' => Request::is('list/current'),  
                    'font-light text-neutral-600 dark:text-neutral-300' => !Request::is('list/current'), 
                    ])
            >
                Current
            </a>
            <a 
                href="{{ route('list.index', ['list' => 'wishlist']) }}" 
                @class([
                    'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                    'font-bold text-black dark:text-white underline' => Request::is('list/wishlist'),
                    'font-light text-neutral-600 dark:text-neutral-300' => !Request::is('list/wishlist'),
                    ])
            >
                Wishlist
            </a>

    </div>
</div>
@else
    <x-booksearch />
@endif

<x-message />

@if (count($books) === 0)
    <p class="pt-4 pl-6 text-center">No books in this list, check back after adding!</p>
@endif

