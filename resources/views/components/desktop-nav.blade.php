<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:flex-shrink-0">
  <div class="flex flex-col w-64">
    <div class="flex flex-col flex-grow bg-pine-600 pt-5 pb-4 overflow-y-auto">
      <div class="bg-white rounded mx-5 flex items-center flex-shrink-0 px-4 py-4">
        <img class="h-8 w-auto" src="{{ asset('img/mddlogo.png') }}" alt="My Daily Dozen">
      </div>
      <div class="mt-5 flex-1 flex flex-col overflow-y-auto">
        <div class="overflow-y-auto">
          <nav class="px-2 space-y-1">

            <x-desktop-nav-link link="groups" text="Home">
              <x-slot name="icon">
                <x-icons.home />
              </x-slot>
            </x-desktop-nav-link>

            <x-desktop-nav-link link="history" text="History">
              <x-slot name="icon">
                <x-icons.clock />
              </x-slot>
            </x-desktop-nav-link>
          </nav>
        </div>
        <div class="mt-6 flex-1 h-0 overflow-y-auto">
          <nav class="px-2 space-y-1">

            <x-desktop-nav-link link="settings" text="Settings">
              <x-slot name="icon">
                <x-icons.cog />
              </x-slot>
            </x-desktop-nav-link>

            <x-desktop-nav-link link="contact" text="Contact">
              <x-slot name="icon">
                <x-icons.question-mark-circle />
              </x-slot>
            </x-desktop-nav-link>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
