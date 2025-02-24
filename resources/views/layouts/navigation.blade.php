<nav class="border-gray-200 py-6">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        <a href="{{ route('booksearch') }}" class="flex">
            <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
            <span class="self-center text-lg font-semibold whitespace-nowrap">Librisearch</span>
        </a>
        <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-gray-400 hover:text-gray-900 focus:outline-hidden focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
            <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                @if (Auth::check())
                    <li>
                        <a href="{{ route('booksearch') }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->routeIs('booksearch') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Search') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('list.index', ['list' => 'finished']) }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->is('list/finished') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Finished') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('list.index', ['list' => 'current']) }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->is('list/current') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Current') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('list.index', ['list' => 'wishlist']) }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->is('list/wishlist') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Wishlist') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->routeIs('profile.edit') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 text-gray-700 hover:text-blue-700">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('booksearch') }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->routeIs('booksearch') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Search') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->routeIs('login') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 rounded-sm md:p-0 {{ request()->routeIs('register') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-700' }}">
                            {{ __('Create Account') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>