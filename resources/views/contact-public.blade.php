<x-guest-layout title="Contact Us" class="bg-white" showNavigation>
    <x-contact-form>
        <h1 class="mb-10 text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            Get in touch with us!
        </h1>
    </x-contact-form>

    @push('scripts')
        @vite('resources/js/alpine.js')
    @endpush
</x-guest-layout>
