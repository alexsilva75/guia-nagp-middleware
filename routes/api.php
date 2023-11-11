<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::resource('search', \App\Http\Controllers\SearchMidController::class);
    Route::resource('blog-post', \App\Http\Controllers\BlogPostController::class);
    Route::get('home', function () {
        return response()->json(['OK']);
    });
    Route::post('login', \App\Http\Controllers\TokenLoginController::class);
});


Route::resource('search-log', \App\Http\Controllers\SearchLogController::class);
