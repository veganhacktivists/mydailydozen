<?php

namespace App\Http\Controllers;

use App\Models\DetailType;
use Illuminate\Http\Request;

class DetailTypeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'video' => 'required',
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
            'video' => 'required',
            'info' => 'required',
        ]);

        $detailType = DetailType::where('id', $detailTypeId)->first();

        $detailType->name = $request->name;
        $detailType->video = $request->video;
        $detailType->info = $request->info;
        $detailType->save();

        return redirect('groups/' . $request->groupId);
    }

    public function destroy(Request $request, $detailTypeId)
    {
        $detailType = DetailType::where('id', $detailTypeId)->first();

        if (DetailType::all()->count() > 1) {
            $detailType->delete();
        }

        return redirect('groups/' . $request->groupId);
    }
}
