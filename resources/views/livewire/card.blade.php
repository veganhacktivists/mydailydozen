<div class="{{ $checkCount ===  $group->per_day ? 'border-pine-400' : ''  }} border-2 bg-white overflow-hidden shadow rounded-lg">
  <div class="p-4">
    <div class="flex items-center">
      <div class="flex-shrink-0 p-2 rounded-lg" style="background:lightgrey;">
        <img class="w-12 h-12" src="{{ $group->icon_location }}" alt="Icon">
      </div>
      <div class="flex flex-col pl-3 flex-1 truncate">
        <div class="flex-1 flex items-center mb-2">
          <div class="flex-0 min-w-0 truncate">
            <h6 class="text-xl font-bold text-dark mr-3 pb-1 truncate">
              {{ $group['name'] }}
            </h6>
          </div>
          <div class="flex-0 flex-shrink-0">
            <a href="/groups/{{ $group['id'] }}/">
              <img src="/assets/icon-info.svg" class="w-6 h-6" />
            </a>
          </div>
        </div>
        <div class="flex items-end justify-end">
          <span class="text-muted text-xs">{{ $checkCount ?? 0 }} / {{ $group->per_day}}</span>
          <div class="flex text-lg leading-7 font-medium text-cool-gray-900">
            @for ($i = 0; $i < $group['per_day']; $i++) 
              @if($i < $checkCount) 
                <input type="checkbox" class="w-6 h-6 ml-2" style="cursor: pointer;" id="{{ $group['name'].$i }}" wire:click.prevent="uncheck" checked>
                @else
                <input type="checkbox" class="w-6 h-6 ml-2" style="cursor: pointer;" id="{{ $group['name'].$i }}" wire:click.prevent="check">
              @endif
            @endfor
          </div>
        </div>
      </div>
    </div>
  </div>
  @if (Auth::user()->isAdmin())
    <div class="flex justify-end px-3 py-2">
      <a href="/groups/{{ $group['id'] }}/edit" class="flex items-center">
        <span class="font-medium mr-1">Edit</span>
        <img src="/assets/icon-pencil.svg" class="w-6 h-6" />
      </a>
    </div>
  @endif
</div>
