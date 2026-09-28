<x-master>
  <div class="mt-8">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
      <article class="overflow-hidden rounded-2xl bg-white shadow-xs ring-1 ring-gray-200">
        @if($group->banner_location !== "/img/dummy_banner.png")
          @php($banner = public_path(ltrim($group->banner_location, '/')))
          @php($small = preg_replace('/\.webp$/', '-800.webp', $banner))
          <img class="h-40 w-full object-cover sm:h-56" src="{{ asset($group->banner_location) }}" alt="{{ $group->name }} header"
            @if ($small !== $banner && is_file($small) && is_file($banner))
              srcset="{{ asset(preg_replace('/\.webp$/', '-800.webp', $group->banner_location)) }} 800w, {{ asset($group->banner_location) }} {{ getimagesize($banner)[0] }}w"
              sizes="(min-width: 768px) 768px, 100vw"
            @endif>
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
                    class="rounded-md px-3 py-1.5 text-sm font-medium transition focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500"
                    :class="metric === {{ $value }} ? 'bg-white text-gray-900 shadow-xs' : 'text-gray-500 hover:text-gray-900'">
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
              @php($youtube = preg_match('#youtube(?:-nocookie)?\.com/embed/([\w-]{11})#', $detailType->video, $match) ? $match[1] : null)
              <div class="mt-4 aspect-video overflow-hidden rounded-xl bg-gray-900" x-data="{ playing: {{ $youtube ? 'false' : 'true' }} }">
                {{-- A thumbnail until clicked, so the page doesn't load the whole YouTube player up front --}}
                @if ($youtube)
                  <button type="button" x-show="!playing" x-on:click="playing = true" aria-label="{{ __('Play') }}: {{ $detailType->name }}"
                    class="group relative size-full focus:outline-hidden focus-visible:ring-4 focus-visible:ring-inset focus-visible:ring-pine-500">
                    <img class="size-full object-cover" src="https://i.ytimg.com/vi/{{ $youtube }}/hqdefault.jpg" alt="" loading="lazy">
                    <span class="absolute inset-0 flex items-center justify-center">
                      <span class="flex size-16 items-center justify-center rounded-full bg-black/70 text-white transition group-hover:bg-red-600">
                        <svg class="ml-1 size-7" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z" /></svg>
                      </span>
                    </span>
                  </button>
                @endif
                <template x-if="playing">
                  <iframe class="size-full" src="{{ $detailType->video }}{{ $youtube ? (str_contains($detailType->video, '?') ? '&' : '?').'autoplay=1' : '' }}" title="{{ $detailType->name }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </template>
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
