@section('header', __('Profile'))
<x-master>
    <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
        @livewire('profile.update-profile-information-form')

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>
        @endif

        <x-section-border />

        <div class="mt-10 sm:mt-0">
            @livewire('profile.delete-user-form')
        </div>
    </div>
</x-master>
