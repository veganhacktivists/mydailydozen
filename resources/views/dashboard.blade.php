<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body class="antialiased">
<div class="h-screen flex overflow-hidden bg-cool-gray-100">
    <!-- Off-canvas menu for mobile -->
    <div class="lg:hidden">
        <div class="fixed inset-0 flex z-40">
            <div class="fixed inset-0">
                <div class="absolute inset-0 bg-cool-gray-600 opacity-75"></div>
            </div>
            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-pine-600">
                <div class="absolute top-0 right-0 -mr-14 p-1">
                    <button class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-cool-gray-600" aria-label="Close sidebar">
                        <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto" src="{{ asset('img/mddlogo.png') }}" alt="Easywire logo">
                </div>
                <div class="mt-5 overflow-y-auto">
                    <nav class="px-2 space-y-1">
                        <a href="/home" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white bg-pine-700 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                            <!-- Heroicon name: home -->
                            <svg class="mr-4 h-6 w-6 text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Home
                        </a>

                        <a href="/history" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                            <!-- Heroicon name: clock -->
                            <svg class="mr-4 h-6 w-6 text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            History
                        </a>

                        <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                            <!-- Heroicon name: document-report -->
                            <svg class="mr-4 h-6 w-6 text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Metrics
                        </a>
                    </nav>
                </div>
                <div class="mt-6 flex-1 h-0 overflow-y-auto">
                    <nav class="px-2 space-y-1">
                        <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                            <!-- Heroicon name: cog -->
                            <svg class="mr-4 h-6 w-6 text-pine-200 group-hover:text-pine-200 group-focus:text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Customize
                        </a>

                        <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                            <!-- Heroicon name: question-mark-circle -->
                            <svg class="mr-4 h-6 w-6 text-pine-300 group-hover:text-pine-200 group-focus:text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Help
                        </a>

                        <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                            <!-- Heroicon name: shield-check -->
                            <svg class="mr-4 h-6 w-6 text-pine-300 group-hover:text-pine-200 group-focus:text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Privacy
                        </a>
                    </nav>
                </div>
            </div>
            <div class="flex-shrink-0 w-14">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow bg-pine-600 pt-5 pb-4 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-8 w-auto" src="{{ asset('img/mddlogo.png') }}" alt="Easywire logo">
                </div>
                <div class="mt-5 flex-1 flex flex-col overflow-y-auto">
                    <div class="overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-white bg-pine-700 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                                <!-- Heroicon name: home -->
                                <svg class="mr-4 h-6 w-6 text-pine-200 group-hover:text-pine-200 group-focus:text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Home
                            </a>

                            <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                                <!-- Heroicon name: clock -->
                                <svg class="mr-4 h-6 w-6 text-pine-300 group-hover:text-pine-200 group-focus:text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                History
                            </a>

                            <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                                <!-- Heroicon name: document-report -->
                                <svg class="mr-4 h-6 w-6 text-pine-300 group-hover:text-pine-200 group-focus:text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Metrics
                            </a>
                        </nav>
                    </div>
                    <div class="mt-6 flex-1 h-0 overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                                <!-- Heroicon name: cog -->
                                <svg class="mr-4 h-6 w-6 text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Settings
                            </a>

                            <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                                <!-- Heroicon name: question-mark-circle -->
                                <svg class="mr-4 h-6 w-6 text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Help
                            </a>

                            <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-pine-100 hover:text-white hover:bg-pine-500 focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
                                <!-- Heroicon name: shield-check -->
                                <svg class="mr-4 h-6 w-6 text-pine-200 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Privacy
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1 overflow-auto focus:outline-none" tabindex="0">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
            <button class="px-4 border-r border-cool-gray-200 text-cool-gray-400 focus:outline-none focus:bg-cool-gray-100 focus:text-cool-gray-600 lg:hidden" aria-label="Open sidebar">
                <!-- Heroicon name: menu-alt-1 -->
                <svg class="h-6 w-6 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
            <!-- Search bar -->
            <div class="flex-1 px-4 flex justify-between sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="flex-1 flex">
                    <form class="w-full flex md:ml-0" action="#" method="GET">
                        <label for="search_field" class="sr-only">Search</label>
                        <div class="relative w-full text-cool-gray-400 focus-within:text-cool-gray-600">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                </svg>
                            </div>
                            <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 rounded-md text-cool-gray-900 placeholder-cool-gray-500 focus:outline-none focus:placeholder-cool-gray-400 sm:text-sm" placeholder="Search" type="search">
                        </div>
                    </form>
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <button class="p-1 text-cool-gray-400 rounded-full hover:bg-cool-gray-100 hover:text-cool-gray-500 focus:outline-none focus:shadow-outline focus:text-cool-gray-500" aria-label="Notifications">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ closed: true }" @click="closed = !closed" >
                        <div>
                            <button class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:bg-cool-gray-100 lg:p-2 lg:rounded-md lg:hover:bg-cool-gray-100" id="user-menu" aria-label="User menu" aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full"  src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                <p class="hidden ml-3 text-cool-gray-700 text-sm leading-5 font-medium lg:block">{{ $user->name }}</p>
                                <!-- Heroicon name: chevron-down -->
                                <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-cool-gray-400 lg:block" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                            <div :class="{ 'hidden': closed }" class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                <a href="/user/profile" class="block px-4 py-2 text-sm text-cool-gray-700 hover:bg-cool-gray-100 transition ease-in-out duration-150" role="menuitem">Your Profile</a>
                                <a href="/user/api-tokens" class="block px-4 py-2 text-sm text-cool-gray-700 hover:bg-cool-gray-100 transition ease-in-out duration-150" role="menuitem">API Tokens</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-cool-gray-700 hover:bg-cool-gray-100 transition ease-in-out duration-150" role="menuitem">{{ __('Logout') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
            <!-- Page header -->
            <div class="bg-white shadow">
                <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                    <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
                        <div class="flex-1 min-w-0">
                            <!-- Profile -->
                            <div class="flex items-center">
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="hidden h-15 w-15 rounded-full sm:block">
                                <div>
                                    <div class="flex items-center">
                                        <img class="h-15 w-15 rounded-full sm:hidden"  src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                        <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                                            {{ $greeting }}
                                        </h1>
                                    </div>
                                    <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                        <dt class="sr-only">Streak</dt>
                                        <dd class="mt-3 flex items-center text-sm leading-5 text-cool-gray-500 font-medium sm:mr-6 sm:mt-0 capitalize">
                                            <!-- Heroicon name: check-circle -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $streak }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
              <span class="shadow-sm rounded-md">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-cool-gray-300 text-sm leading-5 font-medium rounded-md text-cool-gray-700 bg-white hover:text-cool-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-cool-gray-800 active:bg-cool-gray-50 transition duration-150 ease-in-out">
                  Add money
                </button>
              </span>
                            <span class="shadow-sm rounded-md">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-500 focus:outline-none focus:shadow-outline-pine focus:border-pine-700 active:bg-pine-700 transition duration-150 ease-in-out">
                  Send money
                </button>
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
        </main>
    </div>
</div>
</body>
</html>
