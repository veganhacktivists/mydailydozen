<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  {{ $slot }}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>
