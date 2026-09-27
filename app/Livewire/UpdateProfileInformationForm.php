<?php

namespace App\Livewire;

use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm as JetstreamUpdateProfileInformationForm;

class UpdateProfileInformationForm extends JetstreamUpdateProfileInformationForm
{
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        // No photos, and the password typed to change the email never goes back to the browser
        $this->photo = null;

        try {
            return parent::updateProfileInformation($updater);
        } finally {
            $this->state['current_password'] = '';
        }
    }
}
