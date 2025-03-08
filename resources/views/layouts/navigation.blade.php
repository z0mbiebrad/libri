<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="flex items-center justify-between bg-zinc-100 dark:bg-zinc-900 border-b border-neutral-300 px-6 py-4 dark:border-neutral-700" aria-label="penguin ui menu">
	<!-- Brand Logo -->
	<a href="/" class="text-2xl font-bold text-neutral-900 dark:text-neutral-100">
		<span>Libri<span class="text-black dark:text-zinc-400">search</span></span>
        <x-application-logo class="block w-auto fill-current h-9" />
	</a>
	<!-- Desktop Menu -->
	<ul class="hidden items-center gap-4 md:flex">
        @if (Auth::check())
            <li>
                <a 
                    href="{{ route('booksearch') }}" 
                    @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                        'font-bold text-black dark:text-white' => request()->routeIs('booksearch'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('booksearch'),
                        ])
                >
                    Search
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('list.index', ['list' => 'current']) }}"
                    @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                        'font-bold text-black dark:text-white' => request()->routeIs('list.*'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('list.*'),
                        ])
                >
                    Lists
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('profile.edit') }}" 
                    @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                        'font-bold text-black dark:text-white' => request()->routeIs('profile.edit'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('profile.edit'),
                        ])
                >
                    Profile
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button 
                        type="submit" 
                        @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white hover:cursor-pointer',
                        'font-bold text-black dark:text-white' => request()->routeIs('logout'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('logout'),
                        ])
                    >
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a 
                    @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                        'font-bold text-black dark:text-white' => request()->routeIs('booksearch'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('booksearch'),
                        ])
                    href="{{ route('booksearch') }}" 
                    class="" aria-current="page"
                >
                    Search
                </a>
            </li>
            <li>
                <a 
                    @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                        'font-bold text-black dark:text-white' => request()->routeIs('login'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('login'),
                        ]) 
                    href="{{ route('login') }}" 
                    class=""
                >
                    Login
                </a>
            </li>
            <li>
                <a 
                    @class([
                        'hover:text-black focus:outline-hidden focus:underline underline-offset-2 dark:hover:text-white',
                        'font-bold text-black dark:text-white' => request()->routeIs('register'),
                        'font-medium text-neutral-600 dark:text-neutral-300' => !request()->routeIs('register'),
                        ]) 
                    href="{{ route('register') }}"
                    class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-hidden focus:underline dark:text-neutral-300 dark:hover:text-white"
                >
                    Create Account
                </a>
            </li>
        @endif
	</ul>
	<!-- Mobile Menu Button -->
	<button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-neutral-600 dark:text-neutral-300 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
		<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
		</svg>
		<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
		</svg>
	</button>
	<!-- Mobile Menu -->
	<ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 rounded-b-sm border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-20 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 md:hidden">
        @auth
            
        @endauth
		<li class="py-4"><a href="{{ route('booksearch') }}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300" >Search</a></li>
		<li class="py-4"><a href="{{ route('list.index', ['list' => 'current']) }}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Lists</a></li>
		<li class="py-4"><a href="{{ route('profile.edit') }}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Profile</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit" 
                    class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300 text-left py-4"
                >
                    Logout
                </button>
            </form>
        </li>
	</ul>
</nav>
{{-- w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300 aria-current="page" --}}