<nav x-data="{ open: false }" class="border-b border-gray-100 bg-slate-900">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto sm:px-2 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('booksearch') }}" class="mr-2 text-xl text-slate-300">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                    </a>
                </div>

                @if (Auth::user())
                    <!-- Navigation Links -->
                    <div
                        class="hidden 2xl:space-x-10 xl:space-x-8 lg:space-x-6 md:space-x-4 sm:space-x-2 sm:-my-px sm:flex">
                        <x-nav-link :href="route('booksearch')" :active="request()->routeIs('booksearch')">
                            {{ __('Book Search') }}
                        </x-nav-link>
                        <x-nav-link :href="route('list.index', ['list' => 'finished'])" :active="Request::is('list/finished')">
                            {{ __('Finished Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('list.index', ['list' => 'current'])" :active="Request::is('list/current')">
                            {{ __('Current Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('list.index', ['list' => 'wishlist'])" :active="Request::is('list/wishlist')">
                            {{ __('Wishlist') }}
                        </x-nav-link>
                    </div>
                @else
                    <div class="hidden sm:space-x-8 sm:-my-px sm:flex sm:ml-4">
                        <x-nav-link :href="route('booksearch')" :active="request()->routeIs('booksearch')">
                            {{ __('Book Search') }}
                        </x-nav-link>
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Create Account') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>
            @if (Auth::user())
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif



            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <p class="mr-2">Menu</p>
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @if (Auth::user())
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('booksearch')" :active="request()->routeIs('booksearch')">
                    {{ __('Book Search') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('list.index', ['list' => 'finished'])" :active="Request::is('list/finished')">
                    {{ __('Finished Books') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('list.index', ['list' => 'current'])" :active="Request::is('list/current')">
                    {{ __('Currently Reading') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('list.index', ['list' => 'wishlist'])" :active="Request::is('list/wishlist')">
                    {{ __('Wishlist') }}
                </x-responsive-nav-link>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="text-base font-medium text-slate-300">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-slate-300">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <x-responsive-nav-link :href="route('booksearch')" :active="request()->routeIs('booksearch')">
                {{ __('Book Search') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Create Account') }}
            </x-responsive-nav-link>
        @endif
    </div>
</nav>
