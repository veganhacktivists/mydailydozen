<!-- Off-canvas menu for mobile -->
<div class="lg:hidden" x-show="mobileNavOpened">
  <div class="fixed inset-0 flex z-40">
    <div class="fixed inset-0">
      <div class="absolute inset-0 bg-cool-gray-600 opacity-75"></div>
    </div>
    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-pine-600">
      <div class="absolute top-0 right-0 -mr-14 p-1">
        <button @click="mobileNavOpened = false"
          class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-cool-gray-600"
          aria-label="Close sidebar">
          <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="bg-white rounded mx-5 flex-shrink-0 flex items-center px-4 py-4">
        <img class="h-8 w-auto" src="{{ asset('img/mddlogo.png') }}" alt="My Daily Dozen Logo">
      </div>
      <div class="mt-5 overflow-y-auto">
        <nav class="px-2 space-y-1">
          <a href="/home"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white bg-pine-700 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
            <x-icons.home />
            Home
          </a>

          <a href="/history"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
            <x-icons.clock />
            History
          </a>

          <a href="/metrics"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
            <x-icons.document-report />
            Metrics
          </a>
        </nav>
      </div>
      <div class="mt-6 flex-1 h-0 overflow-y-auto">
        <nav class="px-2 space-y-1">
          <a href="/settings"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
            <!-- Heroicon name: cog -->
            <x-icons.cog />
            Settings
          </a>

          <a href="/help"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
            <x-icons.question-mark-circle />
            Help
          </a>
        </nav>
      </div>
    </div>
    <div class="flex-shrink-0 w-14">
      <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
  </div>
</div>
