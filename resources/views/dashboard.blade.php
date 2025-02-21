<x-master>
  <div class="mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      @if($groups->count() > 0)
      <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($groups as $group)
        <livewire:card :group="$group" />
        @endforeach
      </div>
      @else
      <h2 class="text-lg leading-6 font-medium text-cool-gray-900">No food groups selected to track. <a
          href="{{route('settings')}}" class="text-blue-500 hover:underline">Customize</a>
      </h2>
      @endif
		<br>
		<h2 class="text-lg leading-6 font-medium text-cool-gray-900 mb-6" style="font-weight: 400;">Head over to your <a
          href="{{route('settings')}}" class="text-blue-500 hover:underline">customize page</a> to toggle more groups!
		</h2>
    </div>
  </div>
</x-master>
