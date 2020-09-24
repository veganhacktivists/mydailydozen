<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-head>
  <title>{{ config('app.name', 'My Daily Dozen') }}</title>
</x-head>

<body class="antialiased">
  <div class="h-screen flex overflow-hidden bg-cool-gray-100">

    <x-mobile-nav></x-mobile-nav>
    <x-desktop-nav></x-desktop-nav>

    <div class="flex-1 overflow-auto focus:outline-none" tabindex="0">
      <x-appbar></x-appbar>
      <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
        {{$slot}}
      </main>
    </div>
  </div>
</body>

</html>