@section('header', 'Track your goal progress!')
<x-master>
    <!-- Page header -->
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-history-calendar :history="$history"></x-history-calendar>
        </div>
    </div>
</x-master>
