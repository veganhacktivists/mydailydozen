<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
  public function index()
  {
      $total = Group::all()->sum('per_day');
      return view('history')->with([
          'history' => json_encode(array_values(auth()->user()->groups->map(fn($h) => $h->pivot )->groupBy('recorded_at')->map(fn($item, $key) => [
            'year' => substr($key,0,4),
            'month' => substr($key, 5, 2),
            'day' => substr($key, 8, 2),
            'count' => $item->sum('checked'),
            'percentage' => round($item->sum('checked') / $total * 100)
          ])->toArray())),
          'totalPerDay' => Group::all()->sum('per_day')
      ]);
  }
}
