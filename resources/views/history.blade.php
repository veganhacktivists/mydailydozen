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
	        <h2 class="text-2xl leading-6 font-medium text-cool-gray-900 mb-4">Your daily maximum is: {{$totalPerDay}}</h2>
      <dl class="mb-4 bg-gray-100 text-gray-500 inline-block p-3 border border-gray-500 rounded">
        <dt>Green is greater than 60%.</dt>
        <dt>Yellow is between 30 and 60%.</dt>
        <dt>Red is less than 30%</dt>
        <dt>Gray is 0%</dt>
      </dl>
      <br>
      <p class="mb-2 bg-blue-100 text-blue-600 inline-block p-3 border border-blue-600 rounded">! The number in the
        circle is
        the
        count, not the percentage.</p>
    </div>
    <pre>
    </pre>
  </div>
</x-master>