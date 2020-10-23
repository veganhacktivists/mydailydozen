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
     * @param $group
     * @param $request
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    private function settingsUpdate($group, $request)
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
     * Return the history view.
     * @return Application|Factory|View
     */
    public function history()
    {
        $message = 'Welcome to your history';
        return view('history')->with([
            'message' => $message
        ]);
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
