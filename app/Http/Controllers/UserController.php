<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $groups = Group::all();

        return view('settings')->with([
            'user' => $user,
            'groups' => $groups
        ]);
    }


    public function selectAll()
    {
        auth()->user()->selectAllGroups();

        return redirect()->route('settings');
    }

    public function unselectAll()
    {
        auth()->user()->unselectAllGroups();

        return redirect()->route('settings');
    }
}
