<div
    @class('border-2 p-4 bg-white overflow-hidden rounded-2xl', $checkCount ===  $group->per_day ? 'border-pine-400' : 'border-cool-gray-100')
>
    <div class="flex gap-3 h-full">
        <div class="flex-shrink-0 rounded-xl overflow-hidden">
            <img class="rounded-xl size-16" src="{{ $group->icon_location }}" alt="">
        </div>
        <div class="flex justify-between flex-grow flex-col">
            <div class="flex items-center justify-between">
                <div class="flex items-center truncate">
                    <div class="min-w-0 truncate">
                        <h6 class="text-xl font-medium mr-3 truncate">
                            {{ $group['name'] }}
                        </h6>
                    </div>
                    <div class="flex flex-shrink-0">
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
            </div>
            @if($group['subtitle'])
                <div>
                    {{ $group['subtitle'] }}
                </div>
            @endif
            <div class="flex-1 flex items-end justify-end">
                <div class="flex items-center">
                    <span class="text-muted text-xs"
                        style="font-size: 15px;font-weight: 500;color: #4e4e4e87;">{{ $checkCount ?? 0 }} /
                        {{ $group->per_day}}</span>
                    <div class="flex text-lg leading-7 font-medium text-cool-gray-900">
                        @for ($i = 0; $i < $group['per_day']; $i++)
                            <input
                                @id($group['name'].$i)
                                type="checkbox"
                                class="w-6 h-6 ml-2 text-pine-600"
                                style="cursor: pointer;"
                                wire:click.prevent="check({{$i < $checkCount ? $i : $i + 1}})"
                                wire:model="checkboxes.{{ $i }}"
                            />
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
