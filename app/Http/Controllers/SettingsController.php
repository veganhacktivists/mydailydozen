<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit(Request $request)
    {
        $user = Auth::user();

        return view('settings.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                "unique:users,email,{$user->id}",
            ],
            'password' => 'nullable|required_with:old_password|string|min:8|confirmed',
        ]);

        $user->updateSettings(collect($request->input()));

        return back()->with('success', true);
    }
}
