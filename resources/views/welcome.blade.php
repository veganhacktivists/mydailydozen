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

            <!--
              Mobile menu, show/hide based on menu open state.

              Entering: "duration-150 ease-out"
                From: "opacity-0 scale-95"
                To: "opacity-100 scale-100"
              Leaving: "duration-100 ease-in"
                From: "opacity-100 scale-100"
                To: "opacity-0 scale-95"
            -->
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
                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Product</a>
                            <a href="#"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Features</a>
                            <a href="#"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Marketplace</a>
                            <a href="#"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                               role="menuitem">Company</a>
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
                        Helping you adapt to a plant-based diet.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="#"
                               class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-500 focus:outline-none focus:border-pine-700 focus:shadow-outline-pine transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Get started
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="#"
                               class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-pine-700 bg-pine-100 hover:text-pine-600 hover:bg-pine-50 focus:outline-none focus:shadow-outline-pine focus:border-pine-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Live demo
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('img/splash.jpg') }}"
             alt="">
    </div>
</div>

<section id="features">
    <div class="py-16  overflow-hidden lg:py-24">
        <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">
            <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404"
                 height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)"/>
            </svg>

            <div class="relative">
                <h3 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                    Based on 'how not to die' and 'how not to diet'
                </h3>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl leading-7 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus magnam voluptatum cupiditate
                    veritatis in, accusamus quisquam.
                </p>
            </div>

            <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div class="relative">
                    <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                        Lorem ipsum
                    </h4>
                    <p class="mt-3 text-lg leading-7 text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur minima sequi recusandae,
                        porro maiores officia assumenda aliquam laborum ab aliquid veritatis impedit odit adipisci
                        optio iste blanditiis facere. Totam, velit.
                    </p>

                    <ul class="mt-10">
                        <li>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-pine-500 text-white">
                                        <!-- Heroicon name: globe-alt -->
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-lg leading-6 font-medium text-gray-900">Competitive exchange
                                        rates</h5>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-pine-500 text-white">
                                        <!-- Heroicon name: scale -->
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-lg leading-6 font-medium text-gray-900">No hidden fees</h5>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-pine-500 text-white">
                                        <!-- Heroicon name: lightning-bolt -->
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-lg leading-6 font-medium text-gray-900">Transfers are
                                        instant</h5>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="mt-10 -mx-4 relative lg:mt-0">
                    <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784"
                         height="404" fill="none" viewBox="0 0 784 404">
                        <defs>
                            <pattern id="ca9667ae-9f92-4be7-abcb-9e3d727f2941" x="0" y="0" width="20" height="20"
                                     patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                            </pattern>
                        </defs>
                        <rect width="784" height="404" fill="url(#ca9667ae-9f92-4be7-abcb-9e3d727f2941)"/>
                    </svg>
                    <img class="relative mx-auto" width="490"
                         src="https://tailwindui.com/img/features/feature-example-1.png" alt="">
                </div>
            </div>

            <svg class="hidden lg:block absolute right-full transform translate-x-1/2 translate-y-12" width="404"
                 height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
            </svg>

            <div class="relative mt-12 sm:mt-16 lg:mt-24">
                <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
                    <div class="lg:col-start-2">
                        <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                            Lorem ipsum
                        </h4>
                        <p class="mt-3 text-lg leading-7 text-gray-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ex obcaecati natus
                            eligendi delectus, cum deleniti sunt in labore nihil quod quibusdam expedita nemo.
                        </p>

                        <ul class="mt-10">
                            <li>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-pine-500 text-white">
                                            <!-- Heroicon name: annotation -->
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg leading-6 font-medium text-gray-900">Mobile
                                            notifications</h5>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores
                                            impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis
                                            ratione.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-pine-500 text-white">
                                            <!-- Heroicon name: mail -->
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg leading-6 font-medium text-gray-900">Reminder emails</h5>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores
                                            impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis
                                            ratione.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-10 -mx-4 relative lg:mt-0 lg:col-start-1">
                        <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden"
                             width="784" height="404" fill="none" viewBox="0 0 784 404">
                            <defs>
                                <pattern id="e80155a9-dfde-425a-b5ea-1f6fadd20131" x="0" y="0" width="20"
                                         height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200"
                                          fill="currentColor"/>
                                </pattern>
                            </defs>
                            <rect width="784" height="404" fill="url(#e80155a9-dfde-425a-b5ea-1f6fadd20131)"/>
                        </svg>
                        <img class="relative mx-auto" width="490"
                             src="https://tailwindui.com/img/features/feature-example-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="stats">
    <div class="relative bg-white">
        <div class="h-56 bg-pine-600 sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
            <img class="w-full h-full object-cover" src="{{ asset('img/animals.jpg') }}" alt="Support team">
        </div>
        <div class="relative max-w-screen-xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
            <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
                <div>
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-pine-500 text-white">
                        <!-- Heroicon name: users -->
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    Save the animals -- and your own diet, too!
                </h2>
                <p class="mt-6 text-lg leading-7 text-gray-500">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore nihil ea rerum ipsa. Nostrum
                    consectetur sequi culpa doloribus omnis, molestiae esse placeat, exercitationem magnam quod
                    molestias quia aspernatur deserunt voluptatibus.
                </p>
                <div class="mt-8 overflow-hidden">
                    <dl class="-mx-8 -mt-8 flex flex-wrap">
                        <div class="flex flex-col px-8 pt-8">
                            <dt class="order-2 text-base leading-6 font-medium text-gray-500">
                                Users
                            </dt>
                            <dd class="order-1 text-2xl leading-8 font-extrabold text-pine-600 sm:text-3xl sm:leading-9">
                                1
                            </dd>
                        </div>
                        <div class="flex flex-col px-8 pt-8">
                            <dt class="order-2 text-base leading-6 font-medium text-gray-500">
                                Data Points
                            </dt>
                            <dd class="order-1 text-2xl leading-8 font-extrabold text-pine-600 sm:text-3xl sm:leading-9">
                                0
                            </dd>
                        </div>
                        <div class="flex flex-col px-8 pt-8">
                            <dt class="order-2 text-base leading-6 font-medium text-gray-500">
                                API Calls
                            </dt>
                            <dd class="order-1 text-2xl leading-8 font-extrabold text-pine-600 sm:text-3xl sm:leading-9">
                                0
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
@include('components.footer')
</body>
</html>
