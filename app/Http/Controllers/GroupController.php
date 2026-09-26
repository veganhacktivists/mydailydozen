<?php

namespace App\Http\Controllers;

use App\Models\DetailType;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class GroupController extends Controller
{
    /**
     * Show all my daily dozen food groups.
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $ids = $user->currentGroups->pluck('id')->toArray();
        $groups = Group::whereIn('id', $ids)
            ->get();

        // Fetch today's checkmark counts in a single pivot query and hand them to
        // each card, rather than letting every card query the pivot on mount (N+1).
        $checkCounts = $user->groups()
            ->wherePivot('recorded_at', Carbon::today())
            ->get()
            ->mapWithKeys(fn (Group $group) => [$group->id => (int) $group->pivot->checked]);

        return view('dashboard')->with([
            'user' => $user,
            'greeting' => $this->generateGreeting($user->name),
            'groups' => $groups,
            'checkCounts' => $checkCounts,
        ]);
    }

    /**
     * Display a specific food group's data.
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
     * Lets an admin edit a group.
     * @param Group $group
     * @return Application|Factory|View
     */
    public function edit(Group $group, ?DetailType $detailType = null)
    {
        $detailTypes = $group->detailTypes;

        $selectedDetail = $detailTypes->contains($detailType) ? $detailType : null;

        return view('edit')->with([
            'group' => $group,
            'detailTypes' => $detailTypes,
            'selectedDetail' => $selectedDetail,
        ]);
    }

    /**
     * This is for the administrator group edit form.
     * @param Group $group
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Group $group, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subtitle' => '',
            'icon_location' => 'required',
            'banner_location' => 'required',
            'per_day' => 'required',
        ]);

        $group->name = $request->name;
        $group->subtitle = $request->subtitle;
        $group->icon_location = $request->icon_location;
        $group->banner_location = $request->banner_location;
        $group->per_day = $request->per_day;
        $group->save();
        return redirect('');
    }

    /**
     * Greeting for the user. :)
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
