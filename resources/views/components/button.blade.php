<button {{
    $attributes
        ->class('inline-flex items-center justify-center rounded-lg px-5 py-2.5 text-sm font-semibold shadow-xs transition ease-in-out duration-150 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 bg-pine-600 text-white hover:bg-pine-700 active:bg-pine-800 focus-visible:ring-pine-500')
        ->merge(['type' => 'submit'])
}}>
    {{ $slot }}
</button>
