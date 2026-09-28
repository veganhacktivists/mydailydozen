<!-- Off-canvas menu for mobile -->
<div class="lg:hidden" x-show="mobileNavOpened" x-cloak x-trap.inert.noscroll="mobileNavOpened" x-transition:leave="transition duration-200"
  @keydown.escape.window="mobileNavOpened = false">
  <div class="fixed inset-0 flex z-40">
    <div class="fixed inset-0 bg-cool-gray-600/75" aria-hidden="true" @click="mobileNavOpened = false"
      x-show="mobileNavOpened" x-transition.opacity.duration.200ms></div>
    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-pine-600"
      x-show="mobileNavOpened"
      x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
      x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
      <div class="absolute top-0 right-0 -mr-14 p-1">
        <button @click="mobileNavOpened = false"
          class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white"
          aria-label="Close sidebar">
          <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="bg-white rounded-sm mx-5 shrink-0 flex items-center px-4 py-4">
        <img class="h-8 w-auto" src="{{ asset('img/mddlogo.webp') }}" width="694" height="160" alt="My Daily Dozen Logo">
      </div>
      <div class="mt-5 flex-1 overflow-y-auto">
        <x-nav-links size="text-base" />
      </div>
    </div>
    <div class="shrink-0 w-14">
      <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
  </div>
</div>
