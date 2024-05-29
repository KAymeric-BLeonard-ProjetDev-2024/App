<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\Auth\GithubAuth;
use App\Http\Controllers\Admin\SetAdmin;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    error_log("test");

    // $path = "cd ..\storage\app\pools\golang\piscine";
    // $controller = new testController("$path && go run", "$path-test && go run", "golang","main.go");

    // $result = $controller->RegularTest("KAymeric-BLeonard-ProjetDev-2024", "/printalphabet","main.go");
    // echo $result ? 'true' : 'false';;
    // $result = $controller->RegularTest("KAymeric-BLeonard-ProjetDev-2024", "","atoi.go", "fmt.Println(piscine.Atoi(\"456\"))\nfmt.Println(piscine.Atoi(\"abc\"))");
    // echo $result ? 'true' : 'false';;
    return view('welcome');   
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::get('/github/auth', function () {
    return Socialite::driver('github')->redirect();
})->name('github');
 
Route::get('/github/callback', function () {
    return GithubAuth::connectFromGithub();
});

Route::get('/admin/permissions', [App\Http\Controllers\Admin\Permissions::class, 'index'])->name('permissions');
