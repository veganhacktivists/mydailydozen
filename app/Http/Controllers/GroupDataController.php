<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupDataController extends Controller
{
    /**
     * Display all the user's data for the group.
     * @param Group $group
     * @return JsonResponse
     */
    public function index(Group $group): JsonResponse
    {
        if (auth()->user()) {
            $groupData = auth()->user()->groupDataFor($group)->get();

            return response()->json($groupData, 200);
        }

        return response()->json(null, 403);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Group $group
     * @return JsonResponse
     */
    public function store(Request $request, Group $group): JsonResponse
    {
        $groupData = GroupData::create(
            array_merge($request->all(), ['group_id' => $group->getKey()])
        );
        if ($groupData) {
            return response()->json($groupData, 201);
        }

        return response()->json(null, 400);
    }

    /**
     * Display the specified resource.
     * @param GroupData $groupData
     * @return JsonResponse
     */
    public function show(GroupData $groupData): JsonResponse
    {
        return response()->json($groupData, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param GroupData $groupData
     * @return JsonResponse
     */
    public function update(Request $request, GroupData $groupData): JsonResponse
    {
        if ($groupData->update($request->all())) {
            return response()->json($groupData, 200);
        }

        return response()->json($groupData, 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GroupData $groupData
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(GroupData $groupData): JsonResponse
    {
        if ($groupData->delete()) {
            return response()->json(null, 204);
        }

        return response()->json($groupData, 500);
    }
}
