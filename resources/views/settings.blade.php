@section('header', 'Enable or disable groups!')
<x-master>
    <!-- Page header -->
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3" x-data="{ busy: false }">
                <button type="button" :disabled="busy"
                    class="rounded-lg bg-white px-4 py-2 font-semibold text-pine-700 shadow-sm ring-1 ring-gray-200 transition hover:bg-pine-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500 disabled:opacity-60"
                    @click="busy = true; axios.put('/settings/all').then(() => { location.reload() })">Select All</button>
                <button type="button" :disabled="busy"
                    class="rounded-lg bg-white px-4 py-2 font-semibold text-red-600 shadow-sm ring-1 ring-gray-200 transition hover:bg-red-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 disabled:opacity-60"
                    @click="busy = true; axios.put('/settings/none').then(() => { location.reload() })">Unselect All</button>
            </div>
            @if($groups->count() > 0)
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($groups as $group)
                <livewire:card-toggle :group="$group" :key="'toggle-'.$group->id" />
                @endforeach
            </div>
            @else
            <p class="mt-5 rounded-2xl bg-white px-6 py-12 text-center text-gray-500 shadow-sm ring-1 ring-gray-200">No groups here</p>
            @endif

        </div>
    </div>
</x-master>
