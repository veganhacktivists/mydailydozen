<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
	<title>My Daily Dozen – Track the foods recommended by NutritionFacts.org!</title>

    <link rel="canonical" href="https://mydailydozen.org/" />
    <meta name="description" content="Track the foods recommended by NutritionFacts.org!" />

    <meta property="og:url" content="https://mydailydozen.org/" />
    <meta property="og:title" content="My Daily Dozen" />
    <meta property="og:description" content="Track the foods recommended by NutritionFacts.org!" />
    <meta property="og:image" content="https://mydailydozen.org/og-image.png" />
    <meta property="og:image:width" content="512" />
    <meta property="og:image:height" content="250" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />

	<!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/favicon.png" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />


</head>
<body class="antialiased">
    <div class="h-screen flex flex-col">
        <div class="relative bg-white overflow-hidden flex-1">
            <div class="max-w-screen-xl mx-auto lg:h-full">
                <div class="relative pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 lg:h-full">
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                    <a href="{{ env('APP_URL') ?? 'https://mydailydozen.org' }}" aria-label="Home">
                                        <img class="h-8 w-auto sm:h-10" src="{{ asset('img/mddlogo.png') }}" alt="Dr. Greger’s Daily Dozen">
                                    </a>
                                    <div class="-mr-2 flex items-center md:hidden">
                                <a href="/contact"
                                class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                                <a href="{{ route('login') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                                    in</a>
                                <a href="{{ route('register') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block md:ml-10 md:pr-4">
                                <a href="/contact"
                                class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a>
                                <a href="{{ route('login') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Log
                                    in</a>
                                <a href="{{ route('register') }}"
                                class="ml-8 font-medium text-pine-600 hover:text-pine-900 transition duration-150 ease-in-out">Register</a>
                            </div>
                        </nav>
                    </div>


                    <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                                My Daily <span class="text-pine-600">Dozen</span>
                            </h2>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Eat healthy and feel good about yourself in the process.
                            </p>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Use this website to keep daily track of the foods recommended by Dr. Greger in his New York Times Bestselling book, <a href="https://nutritionfacts.org/book/how-not-to-die/" target="_blank" rel="noopener" style="color:#609c2a;">How Not to Die</a>, and now his new book, <a href="https://nutritionfacts.org/book/how-not-to-diet/" target="_blank"  rel="noopener" style="color:#609c2a;">How Not to Diet</a>!
                            </p>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Dr. Greger’s Daily Dozen details the healthiest foods and how many servings of each we should try to check off every day.
                            </p>
							<p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
							Signup for free and begin keeping <b>track of your health</b> with My Daily Dozen! Dr. Greger also has an <a href="https://apps.apple.com/us/app/dr-gregers-daily-dozen/id1060700802" target="_blank" rel="noopener" style="color:#609c2a;">iOS App</a> and <a href="https://play.google.com/store/apps/details?id=org.nutritionfacts.dailydozen&hl=en" target="_blank" rel="noopener" style="color:#609c2a;">Android App</a>.
							</p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <a href="/register"
                                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-500 focus:outline-none focus:border-pine-700 focus:shadow-outline-pine transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                        Signup to get started!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:pl-6">
                <div class="relative lg:w-full lg:h-[70vh]">
                    <div
                        class="lg:w-full lg:h-full bg-pine-400"
                    >
                    </div>

                    <!-- Slideshow container -->
                    <div class="lg:left-[-4vw] lg:bottom-[-10vh] w-full object-cover lg:absolute lg:h-full" >
                        <!-- Full-width images with rounded edges -->
                        <img
                            class="slides"
                            src="{{ asset('img/blueberry.png') }}"
                            alt="blueberries"
                        />
                        <img
                            class="slides"
                            src="{{ asset('img/vegan-food.png') }}"
                            alt="vegan food"
                        />
                        <img
                            class="slides"
                            src="{{ asset('img/kale.png') }}"
                            alt="kale"
                        />
                        <img
                            class="slides"
                            src="{{ asset('img/ingredients.jpg') }}"
                            alt="ingredients"
                        />
                        <!-- slideshow nav -->
                        <div class="text-center">
                            <!-- Next button -->
                            <a class="left-2 text-4xl text-gray-400 hover:text-gray-500 transition duration-500 ease-in-out cursor-pointer m-0.5" onclick="plusSlides(-1)">&#10094;</a>
                            <!-- The dots/circles -->
                            <span class="dot h-4 w-4 m-1 bg-gray-300 rounded-full cursor-pointer inline-block transition duration-500 ease-in-out hover:bg-gray-400" onclick="currentSlide(1)"></span>
                            <span class="dot h-4 w-4 m-1 bg-gray-300 rounded-full cursor-pointer inline-block transition duration-500 ease-in-out hover:bg-gray-400" onclick="currentSlide(2)"></span>
                            <span class="dot h-4 w-4 m-1 bg-gray-300 rounded-full cursor-pointer inline-block transition duration-500 ease-in-out hover:bg-gray-400" onclick="currentSlide(3)"></span>
                            <span class="dot h-4 w-4 m-1 bg-gray-300 rounded-full cursor-pointer inline-block transition duration-500 ease-in-out hover:bg-gray-400" onclick="currentSlide(4)"></span>
                            <!-- Previous buttons -->
                            <a class="right-2 text-4xl text-gray-400 hover:text-gray-500 transition duration-500 ease-in-out cursor-pointer m-0.5" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
    <!-- js script for homepage image carousel -->
    <script>
    //set up variables
    var slideIndex = 1;
    var timer = null;
    showSlides(slideIndex);

    //Arrow slide controls
    function plusSlides(n) {
        //resets timer
        clearTimeout(timer);
        showSlides(slideIndex += n);
    }

    //Slide controls using dots on bottom of display
    function currentSlide(n) {
        clearTimeout(timer);
        showSlides(slideIndex = n);
    }

    //function to progress image slides
    function showSlides(n) {
        //setup variables
        var i;
        var slides = document.getElementsByClassName("slides");
        var dots = document.getElementsByClassName("dot");

        if (n == undefined) {
            n = ++slideIndex;
        }
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";

        //highlights dot of current image in slideshow
        dots[slideIndex-1].className += " active";

        //determines length each image is displayed for
        timer = setTimeout(showSlides, 6000);
    }
    </script>
</body>
</html>
