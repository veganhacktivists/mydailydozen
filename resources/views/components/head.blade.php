<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  {{ $slot }}
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
  <script src="{{ mix('js/app.js') }}"></script>
</head>