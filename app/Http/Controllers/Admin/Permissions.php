<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class Permissions extends Controller
{
    private $redirectTo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route("home");
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        // if (!$user->is_admin) {
        //     return redirect($this->redirectTo);
        // }
        return view('admin/permissions', ['users' => $users]);
    }
}
