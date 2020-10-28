<div class="bg-white overflow-hidden shadow rounded-lg">
  <div class="p-4">
    <div class="flex items-center">
      <div class="flex-shrink-0 p-2 rounded-lg" style="background:lightgrey;">
        <img class="w-12 h-12" src="{{ $group->icon_location }}" alt="Icon">
      </div>
      <div class="ml-3 mt-3 flex-1">
        <h6 class="text-md leading-5 mb-2 font-bold text-dark truncate">
          {{ $group['name'] }}
        </h6>
        <div class="flex items-center justify-end">
          <span class="text-muted text-xs p-2">{{ $checkCount ?? 0 }} / {{ $group->per_day}}</span>
          <div class="flex text-lg leading-7 font-medium text-cool-gray-900">
            @for ($i = 0; $i < $group['per_day']; $i++) 
              @if($i < $checkCount) 
                <input type="checkbox" class="customCheckbox ml-2" id="{{ $group['name'].$i }}" wire:click.prevent="uncheck" checked>
                @else
                <input type="checkbox" class="customCheckbox ml-2" id="{{ $group['name'].$i }}" wire:click.prevent="check">
              @endif
            @endfor
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-cool-gray-50 px-5 py-3">
    <div class="text-sm leading-5">
      <a href="/groups/{{ $group['id'] }}/"
        class="font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">
        Details
      </a>
      @if (Auth::user()->isAdmin())
      <a href="/groups/{{ $group['id'] }}/edit"
        class="pl-5 font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">
        Edit
      </a>
      @endif
    </div>
  </div>
</div>
