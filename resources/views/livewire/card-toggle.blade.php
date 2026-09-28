<div wire:click="toggleGroup" @class([
    'flex cursor-pointer items-center gap-3 rounded-2xl p-4 shadow-xs ring-1 transition',
    'bg-white ring-pine-300 hover:ring-pine-400' => $checked,
    'bg-gray-50 ring-gray-200 hover:ring-gray-300' => ! $checked,
])>
    <img @class(['size-14 shrink-0 rounded-xl transition', 'opacity-50 grayscale' => ! $checked]) src="{{ $group->icon_location }}" alt="">
    <div class="min-w-0 flex-1">
        <h2 @class(['truncate text-lg font-semibold', 'text-gray-900' => $checked, 'text-gray-500' => ! $checked])>
            {{ $group['name'] }}
        </h2>
        <div class="-ml-1.5 mt-0.5 flex items-center">
            <a href="/groups/{{ $group['id'] }}/" aria-label="{{ $group['name'] }}" @click.stop
                class="rounded-full p-1.5 text-gray-400 transition hover:bg-gray-100 hover:text-pine-600 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500">
                <x-icons.information-circle class="size-5" />
            </a>
            @if (Auth::user()->isAdmin())
                <a href="/groups/{{ $group['id'] }}/edit/{{ $group->detailTypes->first()->id }}" @click.stop
                    class="rounded-full p-1.5 transition hover:bg-gray-100 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500">
                    <x-icons.pencil class="size-5" />
                </a>
            @endif
        </div>
    </div>
    <button type="button" role="switch" aria-checked="{{ $checked ? 'true' : 'false' }}" aria-label="{{ $group['name'] }}"
        wire:click.stop="toggleGroup"
        wire:loading.class="opacity-60"
        @class([
            'relative inline-flex h-7 w-12 shrink-0 items-center rounded-full transition-colors focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500 focus-visible:ring-offset-2',
            'bg-pine-600' => $checked,
            'bg-gray-300' => ! $checked,
        ])>
        <span @class(['inline-block size-5 rounded-full bg-white shadow-xs transition-transform', 'translate-x-6' => $checked, 'translate-x-1' => ! $checked])></span>
    </button>
</div>
