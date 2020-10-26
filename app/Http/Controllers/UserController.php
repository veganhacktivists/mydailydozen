<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * User group toggle.
     */
    public function show()
    {
        $user = auth()->user();
        $groups = Group::all();

        return view('settings')->with([
            'user' => $user,
            'groups' => $groups
        ]);
    }

    /**
     * Update group toggle.
     * @param Group $group
     * @return JsonResponse
     */
    public function update(Group $group)
    {
        $result = Auth::user()->toggleGroup($group);

        return response()->json(null, 201);
    }

    /**
     * Select all groups.
     */
    public function selectAll()
    {

      auth()->user()->selectAllGroups();
    }

    /**
     * Unselect all groups.
     */
    public function unselectAll()
    {
      auth()->user()->unselectAllGroups();
    }
}
