<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class GroupController extends Controller
{
    /**
     * Show all groups.
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $ids = $user->currentGroups->pluck('id')->toArray();
        $groups = Group::whereIn('id', $ids)
            ->get();
        return view('dashboard')->with([
            'user' => $user,
            'greeting' => $this->generateGreeting($user->name),
            'groups' => $groups,
        ]);
    }

    /**
     * Display a specific group.
     * @param Group $group
     * @return Application|Factory|View
     */
    public function show(Group $group)
    {
        $servingSizes = $group->servingSizes;
        $detailTypes = $group->detailTypes;

        return view('show')->with([
            'group' => $group,
            'servingSizes' => $servingSizes,
            'detailTypes' => $detailTypes,
        ]);
    }

    /**
     * Edit a group
     * @param Group $group
     * @return Application|Factory|View
     */
    public function edit(Group $group)
    {
        return view('edit')->with([
            'group' => $group
        ]);
    }

    /**
     * @param Group $group
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Group $group, Request $request)
    {
        if (Auth::user()->isAdmin())
        {
            return $this->adminUpdate($group, $request);
        }
        return $this->userUpdate($group, $request);
    }

    /**
     * Are we on the group list display and it's a regular user?
     * Most common, do this first.
     * @param Group $group
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    private function userUpdate($group, $request)
    {
        $this->validate($request, [
            'checked' => 'required',
        ]);

        $result = Auth::user()->checkEvent($group, $request->checked);
        return response()->json($result, 201);
    }

    /**
     * @param $group
     * @param $request
     * @return Application|JsonResponse|RedirectResponse|Redirector
     * @throws ValidationException
     */
    private function adminUpdate($group, $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'icon_location' => 'required',
            'banner_location' => 'required',
            'per_day' => 'required',
        ]);

        $group->name = $request->name;
        $group->icon_location = $request->icon_location;
        $group->banner_location = $request->banner_location;
        $group->per_day = $request->per_day;
        $group->save();
        return redirect('/');
    }

    /**
     * Greeting for the user.
     * @param $name
     * @return string
     */
    private function generateGreeting($name)
    {
        $hour = date('H');
        $greeting = '';
        if ($hour >= 18) {
            $greeting .= "Good evening, ";
        } elseif ($hour >= 12) {
            $greeting .= "Good afternoon, ";
        } elseif ($hour < 12) {
            $greeting .= "Good morning, ";
        }
        $greeting .= $name . '!';
        return $greeting;
    }
}
