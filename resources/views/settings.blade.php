@section('header', 'Enable or disable groups!')
<x-master>
    <!-- Page header -->
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <button
                    class="p-2 mr-4 font-medium text-pine-500 hover:text-pine-600 transition duration-150 ease-in-out"
                    @click="axios.put('/settings/all').then(() => { location.reload() })">Select All</button>
                <button class="p-2 mr-4 font-medium text-red-500 hover:text-red-600 transition duration-150 ease-in-out"
                    @click="axios.put('/settings/none').then(() => { location.reload() })">Unselect All</button>
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
