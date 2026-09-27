<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\ServingSize;
use Illuminate\Http\Request;

class ServingSizeController extends Controller
{
    public function create(Group $group)
    {
        return view('servingSizes.create')->with([
            'group' => $group
        ]);
    }

    public function edit(Group $group, ServingSize $servingSize)
    {
        return view('servingSizes.edit')->with([
            'servingSize' => $servingSize
        ]);
    }

    public function store(Group $group, Request $request)
    {
        $servingSize = new ServingSize($this->validate($request, [
            'size_metric' => 'required',
            'size_imperial' => 'required'
        ]));
        $servingSize->group_id = $group->id;

        $servingSize->save();
        return redirect("groups/".$servingSize->group->id."/edit");
    }

    public function update(Group $group, ServingSize $servingSize, Request $request)
    {
        $this->validate($request, [
            'size_metric' => 'required',
            'size_imperial' => 'required'
        ]);

        $servingSize->size_metric = $request->size_metric;
        $servingSize->size_imperial = $request->size_imperial;

        $servingSize->save();
        return redirect("groups/".$servingSize->group->id."/edit");
    }

    public function destroy(Group $group, ServingSize $servingSize, Request $request)
    {
        $servingSize->delete();
        return back();
    }
}
