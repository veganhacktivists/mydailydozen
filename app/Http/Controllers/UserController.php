<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show settings page.
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
     * Update user settings.
     * @param Group $group
     */
    public function update(Group $group): JsonResponse
    {
        $result = Auth::user()->toggleGroup($group);

        return response()->json(null, 201);
    }

    public function selectAll()
    {
      
      auth()->user()->selectAllGroups();
    }

    public function unselectAll()
    {
      auth()->user()->unselectAllGroups();
    }
}
