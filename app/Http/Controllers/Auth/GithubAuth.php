<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GithubAuth extends Controller
{
    public static function connectFromGithub()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $githubUser->email,
        ], [
            'password' => bcrypt('password'), // This is just a placeholder, we won't use it as we are using GitHub to authenticate users
            'name' => $githubUser->name ?? $githubUser->nickname,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    
        Auth::login($user);
    
        return redirect('/');
    }
}
