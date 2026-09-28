@php($done = $checkCount >= $group->per_day)
<div x-data="{
        count: {{ $checkCount }},
        tick(box) {
            const before = this.count;
            this.count = box < this.count ? box : box + 1;
            this.$dispatch('serving-checked', { group: {{ $group->id }}, count: this.count });
            this.$wire.check(this.count).catch(() => {
                this.count = before;
                this.$dispatch('serving-checked', { group: {{ $group->id }}, count: before });
            });
        },
    }"
    :class="{ 'bg-pine-50 ring-pine-300': count >= {{ $group->per_day }}, 'bg-white ring-gray-200': count < {{ $group->per_day }} }"
    @class([
        'flex flex-col justify-between gap-4 rounded-2xl p-4 shadow-xs ring-1 transition-colors duration-300',
        'bg-pine-50 ring-pine-300' => $done,
        'bg-white ring-gray-200' => ! $done,
    ])>
    <div class="flex items-start gap-3">
        <img class="size-14 shrink-0 rounded-xl" src="{{ $group->icon_location }}" alt="">
        <div class="min-w-0 flex-1">
            <h2 class="truncate text-lg font-semibold text-gray-900">{{ $group['name'] }}</h2>
            @if($group['subtitle'])
                <p class="truncate text-sm text-gray-500">{{ $group['subtitle'] }}</p>
            @endif
        </div>
        <div class="-mr-1 -mt-1 flex shrink-0 items-center">
            <a href="/groups/{{ $group['id'] }}/" aria-label="{{ $group['name'] }}"
                class="rounded-full p-1.5 text-gray-400 transition hover:bg-gray-100 hover:text-pine-600 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500">
                <x-icons.information-circle class="size-6" />
            </a>
            @if (Auth::user()->isAdmin())
                <a href="/groups/{{ $group['id'] }}/edit/{{ $group->detailTypes->first()->id }}"
                    class="rounded-full p-1.5 transition hover:bg-gray-100 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500">
                    <x-icons.pencil class="size-6" />
                </a>
            @endif
        </div>
    </div>
    <div class="flex items-center justify-between gap-3">
        <div class="flex flex-wrap gap-2">
            @for ($i = 0; $i < $group['per_day']; $i++)
                <input
                    type="checkbox"
                    class="serving"
                    aria-label="{{ $group['name'] }} {{ $i + 1 }} / {{ $group->per_day }}"
                    @checked($i < $checkCount)
                    :checked="{{ $i }} < count"
                    @change="tick({{ $i }})"
                />
            @endfor
        </div>
        <span
            :class="{ 'text-pine-700': count >= {{ $group->per_day }}, 'text-gray-500': count < {{ $group->per_day }} }"
            @class([
                'shrink-0 text-sm font-semibold tabular-nums',
                'text-pine-700' => $done,
                'text-gray-500' => ! $done,
            ])><span x-text="count">{{ $checkCount }}</span> / {{ $group->per_day }}</span>
    </div>
</div>
