<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::controller(PostController::class)->group(function(){
    Route::get('/posts', 'index')->name('posts');
    Route::get('/post/{post}', 'show');
    Route::post('/post', 'store');
    Route::put('/post/{post}', 'update');
    Route::delete('/post/{post}', 'destory');
});