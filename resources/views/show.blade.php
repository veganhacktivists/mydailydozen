<x-master>
  <div class="mt-8">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
      <article class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
        @if($group->banner_location !== "/img/dummy_banner.png")
          <img class="h-40 w-full object-cover sm:h-56" src="{{ asset($group->banner_location) }}" alt="{{ $group->name }} header">
        @endif
        <div class="p-6 sm:p-10">
          <p class="text-sm font-semibold uppercase tracking-wide text-pine-700">More About</p>
          <h1 class="mt-1 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $group->name }}</h1>

          <section x-data="{ metric: true }" class="mt-8">
            <div class="flex flex-wrap items-center justify-between gap-3">
              <h2 class="text-xl font-semibold text-gray-900">{{ __('Serving Sizes') }}</h2>
              <div class="inline-flex rounded-lg bg-gray-100 p-1">
                @foreach (['Metric' => 'true', 'Imperial' => 'false'] as $system => $value)
                  <button type="button" x-on:click="metric = {{ $value }}" :aria-pressed="(metric === {{ $value }}).toString()"
                    class="rounded-md px-3 py-1.5 text-sm font-medium transition focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500"
                    :class="metric === {{ $value }} ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-900'">
                    {{ $system }}
                  </button>
                @endforeach
              </div>
            </div>
            @foreach (['size_metric' => 'metric', 'size_imperial' => '!metric'] as $size => $shown)
              <ul class="mt-4 divide-y divide-gray-100 rounded-xl ring-1 ring-gray-200" x-show="{{ $shown }}" @if ($size === 'size_imperial') x-cloak @endif>
                @foreach ($servingSizes as $servingSize)
                  <li class="px-4 py-3 text-gray-700">{{ $servingSize->$size }}</li>
                @endforeach
              </ul>
            @endforeach
          </section>

          <section class="mt-10">
            <h2 class="text-xl font-semibold text-gray-900">{{ __('More Information') }}</h2>
            @foreach ($detailTypes as $detailType)
              <div class="mt-4 aspect-video overflow-hidden rounded-xl bg-gray-100">
                <iframe class="size-full" src="{{ $detailType->video }}" title="{{ $detailType->name }}" loading="lazy" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="prose prose-lg mt-6 max-w-none text-gray-600">
                <p>{!! nl2br(e($detailType->info)) !!}</p>
              </div>
            @endforeach
          </section>
        </div>
      </article>
    </div>
  </div>
</x-master>
