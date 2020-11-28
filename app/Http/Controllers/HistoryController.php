<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Services\HistoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JsonException;

class HistoryController extends Controller
{
    /**
     * @return Application|Factory|View
     * @throws JsonException
     */
  public function index(HistoryService $historyService)
  {
      $user = auth()->user();
      return view('history')->with([
          'history' => json_encode($historyService->buildForUser($user)->values(), JSON_THROW_ON_ERROR),
          'totalPerDay' => Group::all()->sum('per_day')
      ]);
  }
}
