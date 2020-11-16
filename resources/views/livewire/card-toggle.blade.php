<div class="bg-white overflow-hidden shadow rounded-lg">
  <div class="p-5 cursor-pointer" wire:click="toggleGroup">
    <div class="flex justify-between">
      <div class="flex items-center">
        <dl>
          <dt class="text-sm leading-5 font-medium text-cool-gray-500 truncate">
            {{ $group['name'] }}
          </dt>
        </dl>
      </div>
      <div class="text-pine-500">
        @if($checked)
        <x-icons.check-circle />

        @endif
      </div>

    </div>
  </div>
  <div class="bg-cool-gray-50 px-5 py-3">
    <div class="text-sm leading-5">
      <a href="#" class="font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">
        Details
      </a>
    </div>
  </div>
</div>