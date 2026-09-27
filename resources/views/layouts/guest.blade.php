@props(['title', 'showNavigation' => false, 'mainClass' => null, 'noindex' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite('resources/css/app.css')

        <title>{{ isset($title) ? $title.' – '.config('app.name') : config('app.name').' – Track the foods recommended by NutritionFacts.org!' }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-remember-timezone />
        <x-umami />

        @if($noindex)
        <meta name="robots" content="noindex" />
        @endif
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta name="description" content="Dr. Greger’s Daily Dozen details the healthiest foods and how many servings of each we should try to check off every day." />

        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:title" content="My Daily Dozen" />
        <meta property="og:description" content="Dr. Greger’s Daily Dozen details the healthiest foods and how many servings of each we should try to check off every day." />
        <meta property="og:image" content="{{ url('og-image.jpg') }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:image:alt" content="Dr. Greger’s Daily Dozen" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="en_US" />
        <meta name="twitter:card" content="summary_large_image" />
        @if(request()->is('/'))
        <script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@type' => 'WebSite', 'name' => config('app.name'), 'url' => url('/')], JSON_UNESCAPED_SLASHES) !!}</script>
        @endif

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="/favicon.png" />
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

        <!-- Styles -->

    </head>
    <body {{ $attributes->class("min-h-screen flex flex-col overflow-x-hidden") }}>
        @if($showNavigation)
        <nav class="relative pt-6 px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                <div class="gap-x-4 gap-y-2 flex items-center justify-between flex-wrap w-full md:w-auto">
                    <a class="flex-shrink-0" href="{{ url('/') }}" aria-label="Home">
                        <img class="h-8 w-auto sm:h-10" src="{{ asset('img/mddlogo.webp') }}" width="694" height="160" alt="Dr. Greger’s Daily Dozen">
                    </a>
                    <div class="-mr-2 flex flex-shrink-0 items-center gap-8 md:ml-6 md:mr-0 md:pr-4">
                        <a href="/contact" class="font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Contact</a>
                        @guest
                            <a href="{{ route('login') }}" class="font-medium text-pine-600 transition duration-150 ease-in-out hover:text-pine-900">Log in</a>
                            <a href="{{ route('register') }}" class="font-medium text-pine-600 transition duration-150 ease-in-out hover:text-pine-900">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        @endif
        <main @class($mainClass)>
            {{ $slot }}
        </main>
        <x-footer />
        @stack('scripts')
    </body>
</html>
