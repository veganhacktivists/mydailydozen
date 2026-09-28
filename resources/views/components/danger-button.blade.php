<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center rounded-lg px-5 py-2.5 text-sm font-semibold shadow-xs transition ease-in-out duration-150 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 bg-red-600 text-white hover:bg-red-700 active:bg-red-800 focus-visible:ring-red-500']) }}>
    {{ $slot }}
</button>
