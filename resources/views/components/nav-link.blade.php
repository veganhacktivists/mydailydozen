@props(['link', 'text', 'icon'])

@php($current = request()->is($link, "$link/*"))

<a href="/{{ $link }}" @if ($current) aria-current="page" @endif
  {{ $attributes->class([
    'group flex items-center rounded-lg px-3 py-2 font-medium leading-6 transition ease-in-out duration-150 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white/70',
    'bg-pine-700 text-white' => $current,
    'text-pine-50 hover:bg-pine-700/50 hover:text-white' => ! $current,
  ]) }}>
  {{ $icon }}

  {{ $text }}
</a>
