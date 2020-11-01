<div class="{{ $checkCount ===  $group->per_day ? 'border-pine-400' : ''  }} border-2 bg-white overflow-hidden shadow rounded-lg">
  <div class="p-4">
    <div class="flex items-center">
      <div class="flex-shrink-0 p-2 rounded-lg" style="background:lightgrey;">
        <img class="w-12 h-12" src="{{ $group->icon_location }}" alt="Icon">
      </div>
      <div class="ml-3 flex-1">
        <div class="flex-1 flex items-center mb-2">
          <h6 class="text-xl leading-5 font-bold text-dark truncate mr-3 pb-1">
            {{ $group['name'] }}
          </h6>
          <a href="/groups/{{ $group['id'] }}/">
            <img src="/assets/icon-info.svg" class="w-5 h-5" />
          </a>
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
  <div class="flex justify-end px-3 py-2">
    <a href="/groups/{{ $group['id'] }}/edit" class="flex items-center">
      <span class="font-medium mr-1">Edit</span>
      <img src="/assets/icon-pencil.svg" class="w-6 h-6 color-inherit" />
    </a>
  </div>
  <!-- @if (Auth::user()->isAdmin()) -->
  <!-- @endif -->
</div>
