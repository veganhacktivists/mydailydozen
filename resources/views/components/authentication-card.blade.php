<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="mt-8 w-full overflow-hidden bg-white p-6 shadow-xs ring-1 ring-gray-200 sm:max-w-md sm:rounded-2xl sm:p-8">
        {{ $slot }}
    </div>
</div>
