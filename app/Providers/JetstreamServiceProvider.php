<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Livewire\DeleteUserForm;
use App\Livewire\UpdateProfileInformationForm;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Livewire\Livewire;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Jetstream::deleteUsersUsing(DeleteUser::class);

        Livewire::component('profile.update-profile-information-form', UpdateProfileInformationForm::class);
        Livewire::component('profile.delete-user-form', DeleteUserForm::class);
    }
}
