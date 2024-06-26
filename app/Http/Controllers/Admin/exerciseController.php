<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\Quest;

class exerciseController extends Controller
{
    public function index()
    {
        $quests = Quest::all();
        $exercices = Exercise::all();
        return view('admin/exercise', ['quests' => $quests, 'exercices' => $exercices]);
    }

    public static function Create(Request $request){
        $request->validate([
            "name" => "required|string",
            "instructions" => "required|string",
            "quest" => "required|integer",
            "file" => "required|string",
        ]);
        Exercise::create($request->all());
        return redirect()->route('exercicesAdmin');
    }

    public static function Update(Request $request){
        $request->validate([
            "id" => "required|integer",
            "name" => "required|string",
            "instructions" => "required|string",
            "quest" => "required|integer",
            "file" => "required|string",
        ]);
          $exercice = Exercise::find($request->id);
          $exercice->update($request->all());
          return redirect()->route('exercicesAdmin');
        }

    public static function Delete(Request $request){
        Exercise::destroy($request->id);
        return redirect()->route('exercicesAdmin');
    }
}
