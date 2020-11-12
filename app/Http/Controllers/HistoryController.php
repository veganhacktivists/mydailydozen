<?php

namespace App\Http\Controllers;

use App\Models\Group;
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
  public function index()
  {
      $total = Group::all()->sum('per_day');
      return view('history')->with([
          'history' => json_encode(auth()->user()->groups->pluck('pivot')->groupBy('recorded_at')->map(fn($item, $key) => [
              'year' => substr($key, 0, 4),
              'month' => substr($key, 5, 2),
              'day' => substr($key, 8, 2),
              'count' => $item->sum('checked'),
              'percentage' => round($item->sum('checked') / $total * 100)
          ])->values(), JSON_THROW_ON_ERROR),
          'totalPerDay' => Group::all()->sum('per_day')
      ]);
  }
}
