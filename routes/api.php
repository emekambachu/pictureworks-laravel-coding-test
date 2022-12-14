<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'allUsers'])
    ->name('users.list');
Route::post('/user/{id}/comment', [App\Http\Controllers\UserController::class, 'addUserComment'])
    ->name('user.comment.store');
Route::get('/user/{id}/comments', [App\Http\Controllers\UserController::class, 'getUserComments'])
    ->name('user.comments.list');
