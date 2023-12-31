<nav x-data="{ show: false }" class="border-b shadow-md border-slate-600 shadow-slate-600 bg-slate-900">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto sm:px-2 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('booksearch') }}" class="mr-2 text-xl">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                    </a>
                </div>

                @if (Auth::user())
                    <!-- Navigation Links -->
                    <div class="hidden 2xl:space-x-10 xl:space-x-8 lg:space-x-6 md:space-x-4 sm:space-x-8 sm:flex">
                        <x-nav-link class="sm:ml-4" :href="route('booksearch')" :active="request()->routeIs(['booksearch', 'results.show'])">
                            {{ __('Search') }}
                        </x-nav-link>
                        <x-nav-link :href="route('list.index', ['list' => 'finished'])" :active="Request::is('list/finished')">
                            {{ __('Finished') }}
                        </x-nav-link>
                        <x-nav-link :href="route('list.index', ['list' => 'current'])" :active="Request::is('list/current')">
                            {{ __('Current') }}
                        </x-nav-link>
                        <x-nav-link :href="route('list.index', ['list' => 'wishlist'])" :active="Request::is('list/wishlist')">
                            {{ __('Wishlist') }}
                        </x-nav-link>
                    </div>
                @else
                    <div class="hidden sm:space-x-8 sm:-my-px sm:flex sm:ml-4">
                        <x-nav-link :href="route('booksearch')" :active="request()->routeIs('booksearch')">
                            {{ __('Search') }}
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
                            <button class="">
                                <div>{{ Auth::user()->name }}</div>
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
                <button @click="show = ! show"
                    class="inline-flex items-center justify-center p-2 text-white transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-slate-600 focus:outline-none focus:bg-slate-700 focus:text-white">
                    @auth
                        <p class="mr-2">{{ Auth::user()->name }}</p>
                    @else
                        <p class="mr-2">Menu</p>
                    @endauth
                    <x-dropdown-icon />
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': show, 'hidden': !show }" class="hidden sm:hidden">
        @if (Auth::user())
            <div class="pt-2 pb-3 space-y-1 shadow-inner shadow-slate-600">
                <x-responsive-nav-link :href="route('booksearch')" :active="request()->routeIs(['booksearch', 'results.show'])">
                    {{ __('Search') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('list.index', ['list' => 'finished'])" :active="Request::is('list/finished')">
                    {{ __('Finished') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('list.index', ['list' => 'current'])" :active="Request::is('list/current')">
                    {{ __('Current') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('list.index', ['list' => 'wishlist'])" :active="Request::is('list/wishlist')">
                    {{ __('Wishlist') }}
                </x-responsive-nav-link>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t shadow-inner border-slate-600 shadow-slate-600">
                <div class="px-4">
                    <div class="text-base font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium">{{ Auth::user()->email }}</div>
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
