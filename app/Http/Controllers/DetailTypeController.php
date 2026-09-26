<?php

namespace App\Http\Controllers;

use App\Models\DetailType;
use Illuminate\Http\Request;

class DetailTypeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'groupId' => 'required|exists:groups,id',
            'name' => 'required',
            'video' => 'required|url:https',
            'info' => 'required',
        ]);

        DetailType::create([
            'group_id' => $request->groupId,
            'name' => $request->name,
            'video' => $request->video,
            'info' => $request->info,
        ]);

        return redirect('groups/' . $request->groupId);
    }

    public function update(Request $request, $detailTypeId)
    {
        $this->validate($request, [
            'name' => 'required',
            'video' => 'required|url:https',
            'info' => 'required',
        ]);

        $detailType = DetailType::findOrFail($detailTypeId);

        $detailType->name = $request->name;
        $detailType->video = $request->video;
        $detailType->info = $request->info;
        $detailType->save();

        return redirect('groups/' . $detailType->group_id);
    }

    public function destroy(Request $request, $detailTypeId)
    {
        $detailType = DetailType::findOrFail($detailTypeId);

        if ($detailType->group->detailTypes()->count() > 1) {
            $detailType->delete();
        }

        return redirect('groups/' . $detailType->group_id);
    }
}
