<div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
    <button @click="mobileNavOpened = true"
        class="px-4 border-r border-cool-gray-200 text-cool-gray-400 focus:outline-none focus:bg-cool-gray-100 focus:text-cool-gray-600 lg:hidden"
        aria-label="Open sidebar">
        <!-- Heroicon name: menu-alt-1 -->
        <svg class="h-6 w-6 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
    </button>
    <!-- Search bar -->
    <div class="flex-1 px-4 flex justify-between sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
        <div class="flex-1 flex">
           <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate" style="font-weight: 500;margin: 15px 0px 0px 0px;scroll-margin-bottom: auto;">
                  {{ $greeting }}
                </h1>
        </div>
        <div class="ml-4 flex items-center md:ml-6">

            <!-- Profile dropdown -->
            <div class="ml-3 relative" x-data="{ closed: true }" @click="closed = !closed">
                <div>
                    <button
                        class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:bg-cool-gray-100 lg:p-2 lg:rounded-md lg:hover:bg-cool-gray-100"
                        id="user-menu" aria-label="User menu" aria-haspopup="true">
                        <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                            alt="{{ auth()->user()->name }}">
                        <p class="hidden ml-3 text-cool-gray-700 text-sm leading-5 font-medium lg:block">
                            {{ auth()->user()->name }}
                        </p>
                        <!-- Heroicon name: chevron-down -->
                        <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-cool-gray-400 lg:block" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                    <div x-show="!closed" @click.away="closed = true" class="py-1 rounded-md bg-white shadow-xs"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                        <a href="/user/profile"
                            class="block px-4 py-2 text-sm text-cool-gray-700 hover:bg-cool-gray-100 transition ease-in-out duration-150"
                            role="menuitem">Your Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-cool-gray-700 hover:bg-cool-gray-100 transition ease-in-out duration-150"
                                role="menuitem">{{ __('Logout') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
