<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quest;
use App\Models\Pool;

class questController extends Controller
{
    public function index()
    {
        $quests = Quest::all();
        $pools = Pool::all();
        return view('admin/quest', ['quests' => $quests, 'pools' => $pools]);
    }

    public static function Create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'pool' => 'required|integer',
        ]);
        Quest::create($request->all());
        return redirect()->route('questsAdmin');
    }

    public static function Update(Request $request){
        $request->validate([
            'name' => 'required|string',
            'pool' => 'required|integer',
          ]);
          $quest = Quest::find($request->id);
          $quest->update($request->all());
          return redirect()->route('questsAdmin');
        }

    public static function Delete(Request $request){
        Quest::destroy($request->id);
        return redirect()->route('questsAdmin');
    }
}
