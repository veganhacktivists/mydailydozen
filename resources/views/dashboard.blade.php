<x-master>
  <!-- Page header -->
  <div class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
      <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
        <div class="flex-1 min-w-0">
          <!-- Profile -->
          <div class="flex items-center">
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
              class="hidden h-15 w-15 rounded-full sm:block">
            <div>
              <div class="flex items-center">
                <img class="h-15 w-15 rounded-full sm:hidden" src="{{ $user->profile_photo_url }}"
                  alt="{{ $user->name }}">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                  {{ $greeting }}
                </h1>
              </div>
              <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                <dt class="sr-only">Streak</dt>
                <dd
                  class="mt-3 flex items-center text-sm leading-5 text-cool-gray-500 font-medium sm:mr-6 sm:mt-0 capitalize">
                  <!-- Heroicon name: check-circle -->
                  <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd" />
                  </svg>
                  {{ $streak }}
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
          <span class="shadow-sm rounded-md">
          </span>
          <span class="shadow-sm rounded-md">
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-lg leading-6 font-medium text-cool-gray-900">Daily Dozen</h2>
      <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @each('inc.card', $groups, 'item')
      </div>
    </div>
  </div>
</x-master>