<div class="col-span-5 my-4">
    @auth
        @if (request()->routeIs('list.*'))
            <x-dropdown>
                <x-slot name="trigger">
                    Book Options
                </x-slot>
                <x-slot name="content">
                    <div class="flex justify-center">
                        <x-book-delete :book="$book" />
                        <x-list-update :book="$book" />
                    </div>
                </x-slot>
            </x-dropdown>
        @endif
        <div x-data="{ isOpen: false, openedWithKeyboard: false }" class="relative w-fit"
            x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
            <!-- Toggle Button -->
            <button type="button" x-on:click="isOpen = ! isOpen"
                class="inline-flex items-center gap-2 whitespace-nowrap rounded-sm border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-800 dark:border-neutral-700 dark:bg-neutral-900 dark:focus-visible:outline-neutral-300"
                aria-haspopup="true" x-on:keydown.space.prevent="openedWithKeyboard = true"
                x-on:keydown.enter.prevent="openedWithKeyboard = true"
                x-on:keydown.down.prevent="openedWithKeyboard = true"
                x-bind:class="isOpen || openedWithKeyboard ? 'text-neutral-900 dark:text-white' :
                    'text-neutral-600 dark:text-neutral-300'"
                x-bind:aria-expanded="isOpen || openedWithKeyboard">
                Add to a list
                <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="size-4 rotate-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <!-- Dropdown Menu -->
            <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
                x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                x-on:keydown.down.prevent="$focus.wrap().next()"
                x-on:keydown.up.prevent="$focus.wrap().previous()"
                class="absolute top-11 left-0 flex w-fit min-w-48 flex-col overflow-hidden rounded-sm border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900"
                role="menu">
                <div 
                    class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white hover:cursor-pointer z-50"
                    role="menuitem">
                    <x-list-add name="finished" :book="$book">
                        Finished
                    </x-list-add>
                </div>
                <div 
                    class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white hover:cursor-pointer z-50"
                    role="menuitem">
                    <x-list-add name="current" :book="$book">
                        Current
                    </x-list-add>
                </div>
                <div 
                    class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white hover:cursor-pointer z-50"
                    role="menuitem">
                    <x-list-add name="wishlist" :book="$book">
                        Wishlist
                    </x-list-add>
                </div>
            </div>
        </div>
    @else
            <a href="{{ route('login') }}" class="text-sm italic text-zinc-500">Login to add to
                a list</a>
    @endauth
</div>