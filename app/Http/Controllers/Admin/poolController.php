<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pool;

class poolController extends Controller
{
    public function index()
    {
        $pools = Pool::all();
        return view('admin/pool', ['pools' => $pools]);
    }

    public static function Create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'mainFile' => 'required|string',
            'Repo' => 'required|string',
        ]);
        Pool::create($request->all());
        return redirect()->route('poolsAdmin');
    }

    public static function Update(Request $request){
        $request->validate([
            'name' => 'required|string',
            'mainFile' => 'required|string',
            'Repo' => 'required|string',
          ]);
          $pool = Pool::find($request->id);
          $pool->update($request->all());
          return redirect()->route('poolsAdmin');
        }

    public static function Delete(Request $request){
        Pool::destroy($request->id);
        return redirect()->route('poolsAdmin');
    }
}
