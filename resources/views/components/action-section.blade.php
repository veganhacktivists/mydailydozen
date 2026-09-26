<div class="md:grid md:grid-cols-3 md:gap-6" {{ $attributes }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="rounded-2xl bg-white px-4 py-5 shadow-sm ring-1 ring-gray-200 sm:p-6">
            {{ $content }}
        </div>
    </div>
</div>