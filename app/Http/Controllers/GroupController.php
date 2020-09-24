<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display the daily dozen groups, etc.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $groups = Group::all()->groupBy('category_id');

        return view('welcome')->with('groups', $groups);
    }

    /**
     * Display a specific group.
     *
     * @return Application|Factory|View
     */
    public function show(Group $group)
    {
        $servingSizes = $group->servingSizes()->get();
        $detailTypes = $group->detailTypes()->get();

        return view('groups.show')->with([
            'group' => $group,
            'serving_sizes' => $servingSizes,
            'detail_types' => $detailTypes,
        ]);
    }

    public function storeChecked(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'checked' => 'required',
            'group' => 'required',
        ]);

        $group = Group::where('name', '=', $request->group)->get();
        $user = Auth::user();

        // $user->groups()->updateExistingPivot($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);
        // $user->groups()->attach($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);

        // $didUpdate = $user->groups()->updateExistingPivot($group[0], ['checked' => $request->checked, 'recorded_at' => now()]) > 0;

        // if(!didUpdate){
        //     $updateResult = $user->groups()->attach($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);
        // }

        // try{
        //     // $user->groups()->save($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);
        //     $user->groups()->updateExistingPivot($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);
        // }catch(QueryException $ex){
        //     // $user->groups()->updateExistingPivot($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);
        //     $user->groups()->save($group[0], ['checked' => $request->checked, 'recorded_at' => now()]);

        // }

        return response()->json([
            'status' => 'success',
            'checked' => $request->checked,
            'group' => $request->group,
        ]);
    }
}
