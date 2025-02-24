<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <a href="{{ route('register') }}"
        class="flex justify-center p-2 mx-auto text-xl font-semibold underline rounded-lg">New user? Create
        account here</a>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <br>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm shadow-xs border-slate-950 focus:ring-slate-500"
                    name="remember">
                <span class="ml-2 text-sm ">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm underline rounded-md hover:text-gray-900 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
