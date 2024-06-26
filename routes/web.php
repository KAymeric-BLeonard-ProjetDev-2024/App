<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\Auth\GithubAuth;
use App\Http\Controllers\Admin\SetAdmin;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\pools\poolController;
use App\Http\Controllers\pools\questController;
use App\Http\Controllers\pools\exerciseController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::get('/github/auth', function () {
    return Socialite::driver('github')->redirect();
})->name('github');
 
Route::get('/github/callback', function () {
    return GithubAuth::connectFromGithub();
});

Route::get('/admin/permissions', [App\Http\Controllers\Admin\Permissions::class, 'index'])->name('permissions')->middleware('auth');;
Route::get('/admin/pools', [App\Http\Controllers\Admin\poolController::class, 'index'])->name('poolsAdmin')->middleware('auth');;
Route::get('/admin/quests', [App\Http\Controllers\Admin\questController::class, 'index'])->name('questsAdmin')->middleware('auth');;
Route::get('/admin/exercices', [App\Http\Controllers\Admin\exerciseController::class, 'index'])->name('exercicesAdmin')->middleware('auth');;

Route::get('/pool/{id}', function (string $id) {
    $ctrl = new poolController();

    return $ctrl->index($id);
})->name('pool')->middleware('auth');;

Route::get('/quest/{id}', function (string $id) {
    $ctrl = new questController();

    return $ctrl->index($id);
})->name('quest')->middleware('auth');;

Route::get('/exercise/{id}', function (string $id) {
    $ctrl = new exerciseController();

    return $ctrl->index($id);
})->name('exercise')->middleware('auth');

Route::get('/test/{id}', function (string $id) {
    $ctrl = new exerciseController();

    return $ctrl->test($id);
})->name('test')->middleware('auth');

