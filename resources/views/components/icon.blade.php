{{-- For a list of available icons, please go to https://fontawesome.com/icons. --}}
{{-- We only have the free icons. --}}
{{-- $type can be either 's' (solid), 'r' (regular), or 'b' (brand). --}}
{{-- The others are for paid icons.  */ --}}

@props(['type', 'name'])
<i {{ $attributes->merge(['class' => "icon fa{$type} fa-{$name} fa-fw"]) }}></i>
