<x-guest-layout mainClass="grid place-items-center grow" class="bg-white" showNavigation>
<div class="md:p-10 lg:py-6 lg:short:py-3 flex gap-x-20 flex-col lg:flex-row max-w-(--breakpoint-xl) m-auto place-items-center justify-center">
    <div class="max-w-(--breakpoint-sm) md:min-w-[510px] mx-auto">
        <div class="pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-0 lg:h-full">
            <div class="mt-10 mx-auto max-w-(--breakpoint-xl) px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-0 lg:px-8">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                        My Daily <span class="text-pine-600">Dozen</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 lg:mt-4 lg:short:mt-3 lg:short:text-lg">
                        Eat healthy and feel good about yourself in the process.
                    </p>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 lg:mt-4 lg:short:mt-3 lg:short:text-lg">
                        Use this website to keep daily track of the foods recommended by Dr. Greger in his New York Times Bestselling book, <x-link href="https://nutritionfacts.org/book/how-not-to-die/">How Not to Die</x-link>, and now his new book, <x-link href="https://nutritionfacts.org/book/how-not-to-diet/">How Not to Diet</x-link>!
                    </p>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 lg:mt-4 lg:short:mt-3 lg:short:text-lg">
                        Dr. Greger’s Daily Dozen details the healthiest foods and how many servings of each we should try to check off every day.
                    </p>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 lg:mt-4 lg:short:mt-3 lg:short:text-lg">
                    Signup for free and begin keeping <b>track of your health</b> with My Daily Dozen! Dr. Greger also has an <x-link href="https://apps.apple.com/us/app/dr-gregers-daily-dozen/id1060700802">iOS App</x-link> and <x-link href="https://play.google.com/store/apps/details?id=org.nutritionfacts.dailydozen">Android App</x-link>.
                    </p>
                    <div class="mt-5 sm:mt-8 lg:mt-6 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow-sm">
                            <a href="/register"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-700 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500 focus-visible:ring-offset-2 transition duration-150 ease-in-out md:py-4 md:text-lg md:leading-7 md:px-10">
                                Signup to get started!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative grow">
        <div class="hidden lg:block absolute top-[-100vh] right-[-100vw] left-16 bottom-24 bg-pine-400 -z-10"></div>
        <x-carousel
            class="max-w-4xl lg:max-w-[min(56rem,calc((100vh-14rem)*4/3))]"
            :images="[
                ['src' => asset('img/blueberry.webp'), 'srcset' => asset('img/blueberry-800.webp').' 800w, '.asset('img/blueberry.webp').' 1600w', 'alt' => 'blueberries' ],
                ['src' => asset('img/vegan-food.webp'), 'srcset' => asset('img/vegan-food-800.webp').' 800w, '.asset('img/vegan-food.webp').' 1600w', 'alt' => 'vegan food' ],
                ['src' => asset('img/kale.webp'), 'srcset' => asset('img/kale-800.webp').' 800w, '.asset('img/kale.webp').' 1600w', 'alt' => 'kale' ],
                ['src' => asset('img/ingredients.jpg'), 'srcset' => asset('img/ingredients-800.webp').' 800w, '.asset('img/ingredients.jpg').' 1000w', 'alt' => 'ingredients' ],
            ]"
        />
    </div>
</div>
</x-guest-layout>
