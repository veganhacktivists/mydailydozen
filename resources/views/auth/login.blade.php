<x-guest-layout title="Login">
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 rounded-lg bg-pine-50 px-3 py-2 text-sm font-medium text-pine-800 ring-1 ring-pine-200" role="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" autocomplete="username" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <x-checkbox name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <div class="flex flex-col text-right">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Don\'t have an account? Register here') }}
                    </a>
                </div>


                <x-button class="ml-4">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
