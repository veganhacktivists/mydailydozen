<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
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

        return response()->json([
            'status' => 'success',
            'checked' => $request->checked,
            'group' => $request->group,
        ]);
    }
}
