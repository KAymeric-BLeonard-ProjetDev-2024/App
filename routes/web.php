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

    // $path = "cd ..\storage\app\pools\golang\pool";
    // $controller = new testController("$path && go run", "$path-test && go run", "golang","main.go");

    // $result = $controller->RegularTest("KAymeric-BLeonard-ProjetDev-2024", "User-repo-test", "/printalphabet","main.go");
    // echo $result ? 'true' : 'false';;
    // $result = $controller->RegularTest("KAymeric-BLeonard-ProjetDev-2024", "User-repo-test", "","atoi.go", "fmt.Println(pool.Atoi(\"456\"))\nfmt.Println(pool.Atoi(\"abc\"))");
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
Route::get('/admin/pools', [App\Http\Controllers\Admin\poolController::class, 'index'])->name('poolsAdmin');
Route::get('/admin/quests', [App\Http\Controllers\Admin\questController::class, 'index'])->name('questsAdmin');
Route::get('/admin/exercices', [App\Http\Controllers\Admin\exerciseController::class, 'index'])->name('exercicesAdmin');

Route::get('/pool/{id}', function (string $id) {
    return App\Http\Controllers\pools\poolController::index($id);
})->name('pool');

Route::get('/quest/{id}', function (string $id) {
    return App\Http\Controllers\pools\questController::index($id);
})->name('quest');

Route::get('/exercise/{id}', function (string $id) {
    return App\Http\Controllers\pools\exerciseController::index($id);
})->name('exercise');

Route::get('/test/{id}', function (string $id) {
    return App\Http\Controllers\pools\exerciseController::test($id);
})->name('test');