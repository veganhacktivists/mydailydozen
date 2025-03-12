<x-guest-layout>
    <div class="max-w-screen-xl mx-auto lg:h-full">
        <div class="pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 lg:h-full">
            <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                        My Daily <span class="text-pine-600">Dozen</span>
                    </h2>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Eat healthy and feel good about yourself in the process.
                    </p>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Use this website to keep daily track of the foods recommended by Dr. Greger in his New York Times Bestselling book, <x-link href="https://nutritionfacts.org/book/how-not-to-die/">How Not to Die</x-link>, and now his new book, <x-link href="https://nutritionfacts.org/book/how-not-to-diet/">How Not to Diet</x-link>!
                    </p>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Dr. Greger’s Daily Dozen details the healthiest foods and how many servings of each we should try to check off every day.
                    </p>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    Signup for free and begin keeping <b>track of your health</b> with My Daily Dozen! Dr. Greger also has an <x-link href="https://apps.apple.com/us/app/dr-gregers-daily-dozen/id1060700802">iOS App</x-link> and <x-link href="https://play.google.com/store/apps/details?id=org.nutritionfacts.dailydozen">Android App</x-link>.
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
            </div>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:pl-6">
        <div class="lg:w-full lg:h-[70vh]">
            <div
                class="lg:w-full lg:h-full bg-pine-400"
            >
            </div>
            <x-carousel
                class="lg:left-[-4vw] lg:bottom-[-10vh] w-full object-cover lg:absolute lg:h-full"
                :images="[
                    ['src' => asset('img/blueberry.png'), 'alt' => 'blueberries' ],
                    ['src' => asset('img/vegan-food.png'), 'alt' => 'vegan food' ],
                    ['src' => asset('img/kale.png'), 'alt' => 'kale' ],
                    ['src' => asset('img/ingredients.jpg'), 'alt' => 'ingredients' ],
                ]"
            />
        </div>
    </div>
</x-guest-layout>
