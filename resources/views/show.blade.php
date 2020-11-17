<x-master>
    <!-- Page header -->
    <div class="bg-white shadow">
        <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
                <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                    <span class="shadow-sm rounded-md">
                    </span>
                    <span class="shadow-sm rounded-md">
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="relative py-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                    viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404"
                    height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                    viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto mb-6">
                <p class="text-base leading-6 text-teal-600 font-semibold tracking-wide uppercase">More
                    About</p>
                <h1
                    class="mt-2 mb-8 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                    {{ $group->name }}</h1>
            </div>
            <div x-data="{ metric: true }" class="prose prose-lg text-gray-500 mx-auto">
                <figure>
                    <img class="w-full h-32 rounded-lg" style="object-fit: cover;" src="{{ asset($group->banner_location) }}"
                        alt="{{ $group->name }} header">
                    <figcaption>Small description here</figcaption>
                </figure>
                <h3>{{ __('Serving Sizes') }}</h3>
                <div class="btn-group btn-group-toggle inline" data-toggle="buttons">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button x-on:click="metric = false"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-teal-600 hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 transition ease-in-out duration-150">
                            Imperial
                        </button>
                    </span>
                    <span class="inline-flex rounded-md shadow-sm">
                        <button x-on:click="metric = true"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-teal-600 hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 transition ease-in-out duration-150">
                            Metric
                        </button>
                    </span>
                </div>
                @foreach ($servingSizes as $servingSize)
                <p x-show="!metric">{{ $servingSize->size_imperial }}</p>
                <p x-show="metric">{{ $servingSize->size_metric }}</p>
                @endforeach
                <h3>{{ __('More Information') }}</h3>
                @foreach ($detailTypes as $detailType)
                <p>{{ $detailType->video }}</p>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-master>
