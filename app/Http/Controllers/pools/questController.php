<?php

namespace App\Http\Controllers\pools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\quest;

class questController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $exercises = exercise::all()->where('quest', $id);
        $quest = quest::where('id', $id)->first();
        return view('pools/quests', ['exercises' => $exercises, 'quest' => $quest]);
    }
}
