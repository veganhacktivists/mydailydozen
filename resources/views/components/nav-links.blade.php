@props(['size'])

<nav class="space-y-1 px-2">
  <x-nav-link class="{{ $size }}" link="groups" text="My Groups">
    <x-slot name="icon"><x-icons.home /></x-slot>
  </x-nav-link>
  <x-nav-link class="{{ $size }}" link="history" text="View History">
    <x-slot name="icon"><x-icons.clock /></x-slot>
  </x-nav-link>
</nav>
<nav class="mt-6 space-y-1 px-2">
  <x-nav-link class="{{ $size }}" link="settings" text="Customize">
    <x-slot name="icon"><x-icons.cog /></x-slot>
  </x-nav-link>
  <x-nav-link class="{{ $size }}" link="contact" text="Contact">
    <x-slot name="icon"><x-icons.question-mark-circle /></x-slot>
  </x-nav-link>
</nav>
