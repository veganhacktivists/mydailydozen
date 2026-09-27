<?php

namespace App\Livewire;

use App\Support\PasswordCheck;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm as JetstreamDeleteUserForm;

class DeleteUserForm extends JetstreamDeleteUserForm
{
    public function deleteUser(Request $request, DeletesUsers $deleter, StatefulGuard $auth)
    {
        $this->resetErrorBag();
        PasswordCheck::ensure(Auth::user(), $this->password, 'password', __('This password does not match our records.'));

        return parent::deleteUser($request, $deleter, $auth);
    }
}
