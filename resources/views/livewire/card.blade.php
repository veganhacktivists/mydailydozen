<div class="bg-white overflow-hidden shadow rounded-lg">
  <div class="p-5">
    <div class="flex items-center">
      <div class="flex-shrink-0">
        <img class="w-6 h-6 text-cool-gray-400" src="{{ $group->icon_location }}" alt="Icon">
      </div>
      <div class="ml-5 w-0 flex-1">
        <dl>
          <dt class="text-sm leading-5 font-medium text-cool-gray-500 truncate">
            {{ $group['name'] }}
            <span class="text-muted text-xs">{{ $checkCount ?? 0 }} / {{ $group->per_day}}</span>

          </dt>
          <dd>
            <div class="text-lg leading-7 font-medium text-cool-gray-900">
              @for ($i = 0; $i < $group['per_day']; $i++) @if($i < $checkCount) <input type="checkbox"
                class="customCheckbox" id="{{ $group['name'].$i }}" wire:click.prevent="uncheck" checked>
                @else
                <input type="checkbox" class="customCheckbox" id="{{ $group['name'].$i }}" wire:click.prevent="check">
                @endif

                @endfor
            </div>
          </dd>
        </dl>
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
