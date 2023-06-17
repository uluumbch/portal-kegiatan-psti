



<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex justify-center items-center">
        <svg width='64' height='64' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
        <g transform="matrix(1 0 0 1 12 12)" >
        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(27, 197, 49); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 12 2 C 6.477 2 2 6.477 2 12 C 2 17.523 6.477 22 12 22 C 17.523 22 22 17.523 22 12 C 22 6.477 17.523 2 12 2 z M 12 4 C 16.418 4 20 7.582 20 12 C 20 13.597292 19.525404 15.081108 18.71875 16.330078 L 17.949219 15.734375 C 16.397219 14.537375 13.537 14 12 14 C 10.463 14 7.6017813 14.537375 6.0507812 15.734375 L 5.28125 16.332031 C 4.4740429 15.082774 4 13.597888 4 12 C 4 7.582 7.582 4 12 4 z M 12 5.75 C 10.208 5.75 8.75 7.208 8.75 9 C 8.75 10.792 10.208 12.25 12 12.25 C 13.792 12.25 15.25 10.792 15.25 9 C 15.25 7.208 13.792 5.75 12 5.75 z M 12 7.75 C 12.689 7.75 13.25 8.311 13.25 9 C 13.25 9.689 12.689 10.25 12 10.25 C 11.311 10.25 10.75 9.689 10.75 9 C 10.75 8.311 11.311 7.75 12 7.75 z M 12 16 C 15.100714 16 16.768095 17.168477 17.548828 17.753906 C 16.109984 19.141834 14.156852 20 12 20 C 9.843148 20 7.8900164 19.141834 6.4511719 17.753906 C 7.231905 17.168477 8.899286 16 12 16 z M 6.0546875 17.339844 C 6.1756559 17.473131 6.297271 17.605851 6.4257812 17.730469 C 6.2971141 17.605286 6.1747276 17.473381 6.0546875 17.339844 z M 17.912109 17.375 C 17.802435 17.495543 17.692936 17.616825 17.576172 17.730469 C 17.692621 17.617521 17.801457 17.494978 17.912109 17.375 z" stroke-linecap="round" />
        </g>
        </svg>
    </div>


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-white border-gray-300 dark:border-gray-700 text-indigo-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-black-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


