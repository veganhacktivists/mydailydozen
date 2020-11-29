<button
  wire:click="toggleGroup"
  class="{{ $checked ? 'border-pine-400' : 'border-red-400'  }} p-4 border-2 bg-white overflow-hidden rounded-2xl focus:outline-none focus:shadow-outline"
>
    <div class="flex">
        <div class="flex-shrink-0 rounded-xl overflow-hidden">
            <img class="w-16 h-16" src="{{ $group->icon_location }}" alt="Icon">
        </div>
        <div class="flex flex-col pl-3 flex-1">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex items-center truncate">
                    <div class="flex-0 min-w-0 truncate">
                        <h6 class="text-xl font-bold text-dark mr-3 pb-1 truncate">
                            {{ $group['name'] }}
                        </h6>
                    </div>
                    <div class="flex flex-0 flex-shrink-0">
                        <a href="/groups/{{ $group['id'] }}/">
                            <img src="https://i.imgur.com/OmqyxWu.png" class="w-6 h-6" />
                        </a>
                    </div>
                </div>
                @if (Auth::user()->isAdmin())
                <a href="/groups/{{ $group['id'] }}/edit/{{ $group->detailTypes->first()->id }}" class="ml-1">
                    <img src="/assets/icon-pencil.svg" class="w-6 h-6" />
                </a>
                @endif
            </div>
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
