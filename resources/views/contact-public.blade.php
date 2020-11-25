<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/mydailydozen.css') }}" rel="stylesheet" type="text/css">
	<title>Contact us - My Daily Dozen: track the foods recommended by NutritionFacts.org!</title>
	
    <link rel="canonical" href="https://mydailydozen.org/" />
    <meta name="description" content="Track the foods recommended by NutritionFacts.org!" />

    <meta property="og:url" content="https://mydailydozen.org/" />
    <meta property="og:title" content="My Daily Dozen" />
    <meta property="og:description" content="Track the foods recommended by NutritionFacts.org!" />
    <meta property="og:image" content="https://mydailydozen.org/og-image.png" />
    <meta property="og:image:width" content="582" />
    <meta property="og:image:height" content="293" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />	
	
	<!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/favicon.png" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
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
                                    <a href="{{ env('APP_URL') ?? 'https://mydailydozen.org' }}" aria-label="Home">
                                        <img class="h-8 w-auto sm:h-10" src="{{ asset('img/mddlogo.png') }}" alt="Logo">
                                    </a>
                                    <div class="-mr-2 flex items-center md:hidden">
                                <a href="/contact"
                                class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                                @guest
								<a href="{{ route('login') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                                    in</a>
                                <a href="{{ route('register') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
								@endguest
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block md:ml-10 md:pr-4">
                                <a href="/contact"
                                class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                                @guest
								<a href="{{ route('login') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                                    in</a>
                                <a href="{{ route('register') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
								@endguest
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
        </div>
    </div>
</div>

<section id="contact" class="text-center">
    @if (session('success'))
    <div x-data="{open: true}" x-show="open" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="p-2 bg-pine-300 items-center text-white leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-pine-500 uppercase px-2 py-1 text-xs font-bold mr-3">Sent</span>
        <span class="font-semibold mr-2 text-left flex-auto">Thank you for contacting us! We'll respond as soon as we can.</span>
        <button @click="open = false" class="fill-current opacity-75 h-4 w-4 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
    @endif
	<div class="bg-white pt-5 px-4 overflow-hidden sm:px-6 lg:px-8" style="margin-bottom: 70px;">
	  <div class="relative max-w-xl mx-auto">
	    <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404">
	      <defs>
	        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
	          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
	        </pattern>
	      </defs>
	      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
	    </svg>
	    <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404">
	      <defs>
	        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
	          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
	        </pattern>
	      </defs>
	      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
	    </svg>
	    <div class="text-center">
	      <h2 class="text-3xl leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
	        Get in touch with us!
	      </h2>
	    </div>
	    <div class="mt-12">
	      <form action="/contact/send" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8" x-data="{ checked: false }" x-init="$refs.submit.disabled = false">
	      	@csrf
	        <div>
	          <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
	          <div class="mt-1 relative rounded-md shadow-sm">
	            <input id="first_name" name="first_name" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150">
              </div>
              @if ($errors->has('first_name'))
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('first_name') }}
              </div>
              @endif
            </div>

	        <div>
	          <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
	          <div class="mt-1 relative rounded-md shadow-sm">
	            <input id="last_name" name="last_name" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150">
              </div>
              @if ($errors->has('last_name'))
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('last_name') }}
              </div>
              @endif
            </div>

	        <div class="sm:col-span-2">
	          <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
	          <div class="mt-1 relative rounded-md shadow-sm">
	            <input id="email" type="email" name="email" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150">
              </div>
              @if ($errors->has('email'))
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('email') }}
              </div>
              @endif
            </div>

	        <div class="sm:col-span-2">
	          <label for="message" class="block text-sm font-medium leading-5 text-gray-700">Message</label>
	          <div class="mt-1 relative rounded-md shadow-sm">
	            <textarea id="message" name="message" rows="4" class="form-textarea py-3 px-4 block w-full transition ease-in-out duration-150"></textarea>
              </div>
              @if ($errors->has('message'))
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('message') }}
              </div>
              @endif
            </div>

	        <div class="sm:col-span-2">
	          <span class="w-full inline-flex rounded-md shadow-sm">
	            <button type="submit" :class="{ 'opacity-50 cursor-not-allowed': !checked }" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-500 focus:outline-none focus:border-pine-700 focus:shadow-outline-pine active:bg-pine-700 transition ease-in-out duration-150" x-ref="submit">
	              Send email
	            </button>
	          </span>
	        </div>
          </form>
	    </div>
	  </div>
	</div>
</section>
@include('components.footer')

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
