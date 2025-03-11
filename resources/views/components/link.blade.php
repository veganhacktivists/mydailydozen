<a {{
        $attributes->merge(['target' => 'blank', 'rel' => 'noopener'])
        // these styles are not set globally because they'll break most existing links, which only have the default color set
        ->class('text-pine-600 hover:text-pine-500 active:text-pine-700')
    }}>
    {{ $slot }}
</a>
