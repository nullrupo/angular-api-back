<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Commentontroller;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::match(['get','post'],'/login', [AuthController::class, 'login']);
    Route::match(['get','post'],'/register', [AuthController::class, 'register']);
    Route::match(['get','post'],'/logout', [AuthController::class, 'logout']);
    Route::match(['get','post'],'/refresh', [AuthController::class, 'refresh']);
    Route::match(['get','post'],'/blog', [BlogController::class, 'Blog']);
    Route::match(['get','post'],'/comment', [CommentController::class, 'Comment']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::resource('blog', 'App\Http\Controllers\BlogController');
    Route::resource('comment', 'App\Http\Controllers\CommentController');

});
