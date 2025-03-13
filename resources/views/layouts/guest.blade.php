@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/js/app.js', 'resources/css/app.css'])

        <title>
            @isset($title)
                {{ $title }} –
            @endisset
            {{ config('app.name') }}
            @empty($title)
                – Track the foods recommended by NutritionFacts.org!
            @endempty
        </title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="canonical" href="{{ url('/') }}" />
        <meta name="description" content="Track the foods recommended by NutritionFacts.org!" />

        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:title" content="My Daily Dozen" />
        <meta property="og:description" content="Track the foods recommended by NutritionFacts.org!" />
        <meta property="og:image" content="{{ url('og-image.png') }}" />
        <meta property="og:image:width" content="512" />
        <meta property="og:image:height" content="250" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="en_US" />

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="/favicon.png" />
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="min-h-screen bg-white flex flex-col overflow-x-hidden">
        <nav class="relative pt-6 px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                <div class="gap-x-4 gap-y-2 flex items-center justify-between flex-wrap w-full md:w-auto">
                    <a class="flex-shrink-0" href="{{ url('/') }}" aria-label="Home">
                        <img class="h-8 w-auto sm:h-10" src="{{ asset('img/mddlogo.png') }}" alt="Dr. Greger’s Daily Dozen">
                    </a>
                    <div class="-mr-2 flex items-center flex-shrink-0 md:hidden">
                        <a href="/contact"
                        class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                        @guest
                        <a href="{{ route('login') }}"
                        class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                            in</a>
                        <a href="{{ route('register') }}"
                        class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
                        @endguest
                    </div>
                </div>
                <div class="hidden md:block md:ml-10 md:pr-4">
                    <a href="/contact"
                    class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                    @guest
                    <a href="{{ route('login') }}"
                    class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                        in</a>
                    <a href="{{ route('register') }}"
                    class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
                    @endguest
                </div>
            </div>
        </nav>
        <main {{ $attributes->class('flex-grow self-center font-sans text-gray-900 antialiased') }}>
            {{ $slot }}
        </main>
        <x-footer />
        @livewireScripts
        @stack('scripts')
    </body>
</html>
