<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="antialiased">
<div class="relative bg-white overflow-hidden">
    <div class="max-w-screen-xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                 fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon points="50,0 100,0 50,100 0,100"/>
            </svg>

            <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="#" aria-label="Home">
                                <img class="h-8 w-auto sm:h-10" src="{{ asset('img/mddlogo.png') }}" alt="Logo">
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button type="button"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                        id="main-menu" aria-label="Main menu" aria-haspopup="true">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block md:ml-10 md:pr-4">
                        <a href="/contact"
                           class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                        <a href="https://veganhacktivists.org"
                           class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">About</a>
                        <a href="{{ route('login') }}"
                           class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                            in</a>
                        <a href="{{ route('register') }}"
                           class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
                    </div>
                </nav>
            </div>

            <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                <div class="rounded-lg shadow-md">
                    <div class="rounded-lg bg-white shadow-xs overflow-hidden" role="menu" aria-orientation="vertical"
                         aria-labelledby="main-menu">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <img class="h-8 w-auto" src="{{ asset('img/mddlogo.png') }}" alt="">
                            </div>
                            <div class="-mr-2">
                                <button type="button"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                        aria-label="Close menu">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3">
                            <a href="https://veganhacktivists.org"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Vegan Hacktivists</a>
                            <a href="/contact"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Contact Us</a>
                            <a href="https://veganbootcamp.org"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Vegan Bootcamp</a>
                        </div>
                        <div>
                            <a href="{{ route('login') }}"
                               class="block w-full px-5 py-3 text-center font-medium text-pine-600 bg-gray-50 hover:bg-gray-100 hover:text-pine-700 focus:outline-none focus:bg-gray-100 focus:text-pine-700 transition duration-150 ease-in-out"
                               role="menuitem">
                                Log in
                            </a>
                            <a href="{{ route('register') }}"
                               class="block w-full px-5 py-3 text-center font-medium text-pine-600 bg-gray-50 hover:bg-gray-100 hover:text-pine-700 focus:outline-none focus:bg-gray-100 focus:text-pine-700 transition duration-150 ease-in-out"
                               role="menuitem">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                        My Daily
                        <br class="xl:hidden">
                        <span class="text-pine-600">Dozen</span>
                    </h2>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Eat healthy and feel good about yourself in the process.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="/register"
                               class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-500 focus:outline-none focus:border-pine-700 focus:shadow-outline-pine transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Get started
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1580658579404-f92d99fe3edd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1226&q=80"
             alt="">
    </div>
</div>

@include('components.footer')
</body>
</html>
