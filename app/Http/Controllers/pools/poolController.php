<?php

namespace App\Http\Controllers\pools;

use App\Http\Controllers\Controller;
use App\Models\Pool;
use App\Models\Quest;
use Illuminate\Http\Request;

class poolController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function index($id)
    {
        $quests = Quest::all()->where('pool', $id);
        $pool = Pool::where('id', $id)->first();;
        return view('pools/pools', ['quests' => $quests, 'pool' => $pool]);
    }
}
