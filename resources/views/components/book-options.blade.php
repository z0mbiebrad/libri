@auth
    <div x-data="{ isOpen: false, openedWithKeyboard: false }" class="relative w-fit" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
        <!-- Toggle Button -->
        <button type="button" x-on:click="isOpen = ! isOpen"
            class="inline-flex z-50 items-center gap-2 whitespace-nowrap rounded-sm border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-800 dark:border-neutral-700 dark:bg-neutral-900 dark:focus-visible:outline-neutral-300 hover:cursor-pointer"
            aria-haspopup="true" x-on:keydown.space.prevent="openedWithKeyboard = true"
            x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.down.prevent="openedWithKeyboard = true"
            x-bind:class="isOpen || openedWithKeyboard ? 'text-neutral-900 dark:text-white' :
                'text-neutral-600 dark:text-neutral-300'"
            x-bind:aria-expanded="isOpen || openedWithKeyboard">
            @if (request()->routeIs('list.*'))
                Move to list
            @else
                Add to list
            @endif
            <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-4 rotate-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <!-- Dropdown Menu -->
        <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
            x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()"
            x-on:keydown.up.prevent="$focus.wrap().previous()"
            class="absolute top-11 right-0 flex w-fit min-w-48 flex-col overflow-hidden rounded-sm border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900"
            role="menu">
            <x-list-add :book="$book" />
        </div>
    </div>
@else
    <a href="{{ route('login') }}" class="text-sm italic text-zinc-500 mx-auto">Login to add to
        a list</a>
@endauth
