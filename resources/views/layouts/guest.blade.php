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
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
