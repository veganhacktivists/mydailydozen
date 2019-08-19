<?php

namespace App\Http\Controllers;

use Auth;

class DeleteAccountController extends Controller
{
    public function __invoke()
    {
        Auth::user()->delete();

        return redirect()->route('home');
    }
}
