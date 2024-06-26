<?php

namespace App\Http\Controllers\pools;

use App\Http\Controllers\Controller;
use App\Models\Pool;
use App\Models\Quest;
use Illuminate\Http\Request;

class poolController extends Controller
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
        $quests = Quest::all()->where('pool', $id);
        $pool = Pool::where('id', $id)->first();;
        return view('pools/pools', ['quests' => $quests, 'pool' => $pool]);
    }
}
