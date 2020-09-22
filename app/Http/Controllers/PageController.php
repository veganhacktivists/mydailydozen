<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $groups = Group::all();
        return view('dashboard')->with([
            'user' => $user,
            'greeting' => $this->generateGreeting($user->name),
            'streak' => '3 day streak! Awesome!',
            'groups' => $groups,
        ]);
    }

    private function checkStreak($user)
    {
        $streak = $user->streak;
        if ($streak > 1)
        {
            return $streak . ' day streak! Awesome!';
        }
        return '';
    }

    private function generateGreeting($name)
    {
        $hour = date('H');
        $greeting = '';
        if ($hour >= 18) {
            $greeting .= "Good evening, ";
        } elseif ($hour >= 12) {
            $greeting .= "Good afternoon, ";
        } elseif ($hour < 12) {
            $greeting .= "Good morning, ";
        }
        $greeting .= $name . '!';
        return $greeting;
    }
}
