<x-master>
  <!-- Page header -->
  <div class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
      <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
        <div class="flex-1 min-w-0">
          <!-- Profile -->
          <div class="flex items-center">
            <div>
              <div class="flex items-center">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                  Enable or disable groups!
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div>
        <button class="p-2 mr-4 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out" @click="axios.put('/settings/all').then(() => { location.reload() })">Select All</button>
        <button class="p-2 mr-4 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out" @click="axios.put('/settings/none').then(() => { location.reload() })">Unselect All</button>
      </div>
      @if($groups->count() > 0)
      <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($groups as $group)
        <livewire:card-toggle :group="$group" />
        @endforeach
      </div>
      @else
      <p>No groups here</p>
      @endif

    </div>
  </div>
</x-master>