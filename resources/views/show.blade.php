<x-master>
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
        <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384"
          fill="none" viewBox="0 0 404 384">
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
        <h1 class="mt-2 mb-8 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
          {{ $group->name }}</h1>
      </div>
      <div x-data="{ metric: true }" class="prose prose-lg text-gray-500 mx-auto">
        <figure>
          <img class="w-full h-32 rounded-lg" style="object-fit: cover;" src="{{ asset($group->banner_location) }}"
            alt="{{ $group->name }} header">
        </figure>
        <h3>{{ __('Serving Sizes') }}</h3>
        <div class="btn-group btn-group-toggle inline" data-toggle="buttons">
          <span class="inline-flex rounded-sm">
            <button x-on:click="metric = true"
              class="inline-flex items-center px-4 py-2 text-sm leading-4 hover:bg-pine-50 font-medium rounded focus:outline-none focus:border-pine-700 focus:shadow-outline-pine transition ease-in-out duration-150"
              :class="{'text-white bg-pine-600 hover:bg-pine-500 active:bg-pine-700': metric}">
              Metric
            </button>
          </span>
          <span class="inline-flex rounded-sm ">
            <button x-on:click="metric = false"
              class="inline-flex items-center px-4 py-2 text-sm leading-4 hover:bg-pine-50 font-medium rounded  focus:outline-none focus:border-pine-700 focus:shadow-outline-pine  transition ease-in-out duration-150"
              :class="{'text-white bg-pine-600 hover:bg-pine-500 active:bg-pine-700': !metric}">
              Imperial
            </button>
          </span>
        </div>
        <ul>
          @foreach ($servingSizes as $servingSize)
          <li x-show="!metric">{{ $servingSize->size_imperial }}</li>
          <li x-show="metric">{{ $servingSize->size_metric }}</li>
          @endforeach
        </ul>

        <h3>{{ __('More Information') }}</h3>
        <div class="">
            @foreach ($detailTypes as $detailType)
            <div class="border-0 p-1" style="margin-bottom: 10px;">
                <iframe width="100%" height="300px" src="{{ $detailType->video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="">
                        <h5 class=""><a href="{{ $detailType->video }}" target="_blank">{{ $detailType->name }}</a></h5>
                        <p class="">{{ $detailType->info }}</p>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</x-master>