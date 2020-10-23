<x-guest-layout>
  <x-jet-authentication-card>
    <x-slot name="logo">
      <x-jet-authentication-card-logo />
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
      {{ session('status') }}
    </div>
    @endif

      <div class="mx-auto max-w-screen-xl px-4 sm:px-6">
          <div class="text-center">
              <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                  Helping you stick to a healthy, ethical, plant based diet.
              </p>
          </div>
      </div>

    <form method="POST" action="{{ route('login') }}"
      @csrf

      <div>
        <x-jet-label value="{{ __('Email') }}" />
        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
      </div>

      <div class="mt-4">
        <x-jet-label value="{{ __('Password') }}" />
        <x-jet-input class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <div class="block mt-4">
        <label class="flex items-center">
          <input type="checkbox" class="form-checkbox" name="remember">
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


        <x-jet-button class="ml-4">
          {{ __('Login') }}
        </x-jet-button>
      </div>
    </form>
  </x-jet-authentication-card>
</x-guest-layout>
