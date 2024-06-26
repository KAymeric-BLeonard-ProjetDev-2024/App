<?php

namespace App\Http\Controllers\pools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\quest;
use App\Models\pool;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\testController;


class exerciseController extends Controller
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
        $terminal = $_GET['terminal'];
        $result = $_GET['result'];

        if ($terminal == "null") {
            $terminal = "Hey ☺
                    
            Here will be displayed your test output.
            But first, complete the exercise and submit it on Gitea!";
        }

        $exercise = exercise::where('id', $id)->first();;
        $exercises = exercise::all()->where('quest', $exercise->quest);
        return view('pools/exercise', ['exercise' => $exercise, 'exercises' => $exercises, 'terminal' => $terminal, 'result' => $result]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function test($id)
    {
        $exercise = exercise::where('id', $id)->first();
        $quest = quest::where('id', $exercise->quest)->first();
        $pool = pool::where('id', $quest->pool)->first();
        $user = Auth::user();
        $userName = $user->name;
        if($user->name == "KAymeric"){
            $userName = "KAymeric-BLeonard-ProjetDev-2024";
        }

        $path = "cd ..\storage\app\pools\\$pool->name\piscine";
        $controller = new testController("$path && go run", "$path-test && go run", "$pool->name",$pool->mainFile);

        $result = $controller->RegularTest($userName, $pool->Repo, $exercise->path, $exercise->file, $exercise->testScript);

        if ($result[1] == ""){
            $result[1] = "null";
        
        }

        return redirect()->route('exercise', ['id' => $id, 'terminal' => $result[1], 'result' => $result[0]]);
    }
}
