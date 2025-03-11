<button
  wire:click="toggleGroup"
  class="{{ $checked ? 'border-pine-400' : 'border-red-400'  }} p-4 border-2 bg-white overflow-hidden rounded-2xl focus:outline-none focus:shadow-outline"
>
    <div class="flex gap-3">
        <div class="flex-shrink-0 rounded-xl overflow-hidden">
            <img style="border-radius: 12px;" class="w-16 h-16" src="{{ $group->icon_location }}" alt="Icon">
        </div>
        <div class="flex justify-between flex-col w-full min-w-0">
            <div class="flex items-center truncate">
                <div class="min-w-0">
                    <h6 class="text-xl font-bold text-dark mr-3 truncate">
                        {{ $group['name'] }}
                    </h6>
                </div>
                <div class="flex-shrink-0">
                    <a href="/groups/{{ $group['id'] }}/">
                        <x-icons.information-circle class="max-w-full text-[#bababa]" />
                    </a>
                </div>
            </div>
            @if (Auth::user()->isAdmin())
                <a href="/groups/{{ $group['id'] }}/edit/{{ $group->detailTypes->first()->id }}" class="ml-1">
                    <img src="/assets/icon-pencil.svg" class="w-6 h-6" />
                </a>
            @endif
            <div class="flex-1 flex items-end justify-end">
                @if ($checked)
                    <span class="text-pine-400">
                        <x-icons.check-circle />
                    </span>
                @else
                    <span class="text-red-400">
                        <x-icons.close-circle />
                    </span>
                @endif
            </div>
        </div>
    </div>
</button>
