<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class SetAdmin extends Controller
{
    public static function update(array $post)
    {
        $user = User::find($post["id"]);
        $user->is_admin = $post["is_admin"];
        $user->save();
        return redirect()->route('permissions');
    }
}
