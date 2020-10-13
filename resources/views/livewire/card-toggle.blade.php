<div class="bg-white overflow-hidden shadow rounded-lg">
  <div class="p-5 cursor-pointer" wire:click="toggleGroup">
    <div class="flex justify-between">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <svg class="w-6 h-6 text-cool-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
            </path>
          </svg>
        </div>
        <div class="ml-5 flex-1">
          <dl>
            <dt class="text-sm leading-5 font-medium text-cool-gray-500 truncate">
              {{ $group['name'] }}
            </dt>

          </dl>
        </div>
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