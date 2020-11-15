<x-master>
  <!-- Page header -->
  <div class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
      <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
        <div class="flex-1 min-w-0">
          <div class="flex items-center">
            <div>
              <div class="flex items-center">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                  Track your progress watching your health and helping animals.
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
      <x-history-calendar :history="$history"></x-history-calendar>
	        <h2 class="text-lg leading-6 font-medium text-cool-gray-900 mb-4">Your daily maximum is: {{$totalPerDay}}</h2>
			<br>
		<h2 class="text-lg leading-6 font-medium text-cool-gray-900 mb-6">Head over to your <a
          href="{{route('settings')}}" class="text-blue-500 hover:underline">settings page</a> to add or remove groups!
		</h2>
      <br>
      <p class="mb-2 bg-green-100 text-green-600 inline-block p-3 border border-green-600 rounded" style="background-color:#9cd99c80;color: #086c10;">Green is greater than 60%</p>
		<p class="mb-2 bg-yellow-100 text-yellow-600 inline-block p-3 border border-yellow-600 rounded" style="color: #7d7119;">Yellow is between 30 and 60%.</p>
		<p class="mb-2 bg-gray-100 text-gray-600 inline-block p-3 border border-gray-600 rounded">Gray is 0%</p>
    </div>
    <pre>
    </pre>
  </div>
</x-master>