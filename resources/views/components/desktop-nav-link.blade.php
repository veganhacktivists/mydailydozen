<a href="/{{ $link}}"
  class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md {{ (request()->is($link)) ? 'text-white bg-pine-700' : 'text-pine-100 hover:text-white hover:bg-pine-500' }}  focus:outline-none focus:bg-pine-500 transition ease-in-out duration-150">
  <!-- Heroicon name: home -->

  {{$icon}}

  {{$text}}
</a>