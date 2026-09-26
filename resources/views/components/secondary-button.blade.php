<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center rounded-lg px-5 py-2.5 text-sm font-semibold shadow-sm transition ease-in-out duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 bg-white text-gray-700 ring-1 ring-gray-300 hover:bg-gray-50 active:bg-gray-100 focus-visible:ring-pine-500']) }}>
    {{ $slot }}
</button>
