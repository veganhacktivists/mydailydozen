<x-master>
  <div class="mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      @if($groups->count() > 0)
      @php($counts = $groups->mapWithKeys(fn ($group) => [$group->id => max(0, min($checkCounts[$group->id] ?? 0, $group->per_day))]))
      <div class="mb-5 flex items-center gap-4 rounded-2xl bg-white p-4 shadow-xs ring-1 ring-gray-200"
        x-data="{ counts: @js($counts), total: {{ $groups->sum('per_day') }}, done() { return Object.values(this.counts).reduce((a, b) => a + b, 0) } }"
        @serving-checked.window="counts[$event.detail.group] = $event.detail.count">
        <span class="font-semibold text-gray-900">Today</span>
        <div class="h-3 flex-1 overflow-hidden rounded-full bg-gray-100" role="progressbar" aria-label="Today"
          aria-valuemin="0" :aria-valuemax="total" :aria-valuenow="done()">
          <div class="h-full rounded-full bg-pine-500 transition-all duration-500" style="width: {{ $counts->sum() / max(1, $groups->sum('per_day')) * 100 }}%"
            :style="{ width: (done() / total * 100) + '%' }"></div>
        </div>
        <span class="text-sm font-semibold tabular-nums text-gray-700"><span x-text="done()">{{ $counts->sum() }}</span> / {{ $groups->sum('per_day') }}</span>
      </div>
      <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($groups as $group)
        <livewire:card :group="$group" :check-count="$checkCounts[$group->id] ?? 0" :key="'card-'.$group->id" />
        @endforeach
      </div>
      <p class="mt-8 text-center text-gray-500">Head over to your <a
            href="{{route('settings')}}" class="font-medium underline underline-offset-2 hover:text-pine-700">customize page</a> to toggle more groups!
      </p>
      @else
      <div class="rounded-2xl bg-white px-6 py-12 text-center shadow-xs ring-1 ring-gray-200">
        <p class="text-lg text-gray-900">No food groups selected to track.</p>
        <a href="{{route('settings')}}"
          class="mt-4 inline-flex items-center rounded-lg bg-pine-600 px-5 py-2.5 font-semibold text-white shadow-xs transition hover:bg-pine-700 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500 focus-visible:ring-offset-2">Customize</a>
      </div>
      @endif
    </div>
  </div>
</x-master>
