<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SetAdmin;
use App\Http\Controllers\Admin\poolController;
use App\Http\Controllers\Admin\questController;
use App\Http\Controllers\Admin\exerciseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/setadmin', function(Request $request) {
    return SetAdmin::update($_POST);
})->name('setadmin');


Route::post('/admin/pool/create', function(Request $request) {
    return poolController::Create($request);
})->name('createPool');

Route::post('/admin/pool/update', function(Request $request) {
    return poolController::Update($request);
})->name('updatePool');

Route::post('/admin/pool/delete', function(Request $request) {
    return poolController::Delete($request);
})->name('deletePool');

Route::post('/admin/quest/create', function(Request $request) {
    return questController::Create($request);
})->name('createQuest');

Route::post('/admin/quest/update', function(Request $request) {
    return questController::Update($request);
})->name('updateQuest');

Route::post('/admin/quest/delete', function(Request $request) {
    return questController::Delete($request);
})->name('deleteQuest');

Route::post('/admin/exercice/create', function(Request $request) {
    return exerciseController::Create($request);
})->name('createExercice');

Route::post('/admin/exercice/update', function(Request $request) {
    return exerciseController::Update($request);
})->name('updateExercice');

Route::post('/admin/exercice/delete', function(Request $request) {
    return exerciseController::Delete($request);
})->name('deleteExercice');
