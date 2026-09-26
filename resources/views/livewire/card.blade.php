@php($done = $checkCount >= $group->per_day)
<div @class([
    'flex flex-col justify-between gap-4 rounded-2xl p-4 shadow-sm ring-1 transition-colors duration-300',
    'bg-pine-50 ring-pine-300' => $done,
    'bg-white ring-gray-200' => ! $done,
])>
    <div class="flex items-start gap-3">
        <img class="size-14 flex-shrink-0 rounded-xl" src="{{ $group->icon_location }}" alt="">
        <div class="min-w-0 flex-1">
            <h2 class="truncate text-lg font-semibold text-gray-900">{{ $group['name'] }}</h2>
            @if($group['subtitle'])
                <p class="truncate text-sm text-gray-500">{{ $group['subtitle'] }}</p>
            @endif
        </div>
        <div class="-mr-1 -mt-1 flex flex-shrink-0 items-center">
            <a href="/groups/{{ $group['id'] }}/" aria-label="{{ $group['name'] }}"
                class="rounded-full p-1.5 text-gray-400 transition hover:bg-gray-100 hover:text-pine-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500">
                <x-icons.information-circle class="size-6" />
            </a>
            @if (Auth::user()->isAdmin())
                <a href="/groups/{{ $group['id'] }}/edit/{{ $group->detailTypes->first()->id }}"
                    class="rounded-full p-1.5 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500">
                    <x-icons.pencil class="size-6" />
                </a>
            @endif
        </div>
    </div>
    <div class="flex items-center justify-between gap-3">
        <div class="flex flex-wrap gap-2" wire:loading.class="opacity-60">
            @for ($i = 0; $i < $group['per_day']; $i++)
                <input
                    type="checkbox"
                    class="serving"
                    aria-label="{{ $group['name'] }} {{ $i + 1 }} / {{ $group->per_day }}"
                    wire:click.prevent="check({{$i < $checkCount ? $i : $i + 1}})"
                    wire:model="checkboxes.{{ $i }}"
                />
            @endfor
        </div>
        <span @class([
            'flex-shrink-0 text-sm font-semibold tabular-nums',
            'text-pine-700' => $done,
            'text-gray-500' => ! $done,
        ])>{{ $checkCount ?? 0 }} / {{ $group->per_day }}</span>
    </div>
</div>
