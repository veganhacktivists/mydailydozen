<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:shrink-0">
  <div class="flex flex-col w-64">
    <div class="flex flex-col grow bg-pine-600 pt-5 pb-4 overflow-y-auto">
      <div class="bg-white rounded-sm mx-5 flex items-center shrink-0 px-4 py-4">
        <a href="{{ url('/groups') }}"><img class="h-8 w-auto" src="{{ asset('img/mddlogo.webp') }}" width="694" height="160" alt="My Daily Dozen" style="height: 40px;"></a>
      </div>
      <div class="mt-5 flex-1 overflow-y-auto">
        <x-nav-links size="text-sm" />
      </div>
    </div>
  </div>
</div>
