<?php

namespace App\Http\Controllers\pools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\quest;

class questController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function index($id)
    {
        $exercises = exercise::all()->where('quest', $id);
        $quest = quest::where('id', $id)->first();
        return view('pools/quests', ['exercises' => $exercises, 'quest' => $quest]);
    }
}
