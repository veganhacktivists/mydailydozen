<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\ServingSize;
use Auth;
use Illuminate\Http\Request;

class ServingSizeController extends Controller
{

  /**
     * Lets an admin create a serving size.
     * @return Application|Factory|View
     */
    public function create(Group $group)
    {
        return view('servingSizes.create')->with([
            'group' => $group
        ]);
    }

    /**
     * Lets an admin edit a serving size.
     * @param ServingSize $servingSize
     * @return Application|Factory|View
     */
    public function edit(Group $group, ServingSize $servingSize)
    {
        return view('servingSizes.edit')->with([
            'servingSize' => $servingSize
        ]);
    }

    /**
     * @param Group $group
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Group $group, Request $request)
    {
        if (Auth::user()->isAdmin()) {
            
          $servingSize = new ServingSize($this->validate($request, [
            'size_metric' => 'required',
            'size_imperial' => 'required'
          ]));
          $servingSize->group_id = $group->id;
        
          $servingSize->save();
          return redirect("groups/".$servingSize->group->id."/edit");
        }
    }

    /**
     * @param ServingSize $group
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Group $group, ServingSize $servingSize, Request $request)
    {
        if (Auth::user()->isAdmin()) {

            $this->validate($request, [
            'size_metric' => 'required',
            'size_imperial' => 'required'
        ]);

        $servingSize->size_metric = $request->size_metric;
        $servingSize->size_imperial = $request->size_imperial;
       
        $servingSize->save();
        return redirect("groups/".$servingSize->group->id."/edit");
        }
    }

        /**
     * @param ServingSize $group
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function destroy(Group $group, ServingSize $servingSize, Request $request)
    {
        if (Auth::user()->isAdmin()) {
          $servingSize->delete();
          return back();
        }
    }
}
