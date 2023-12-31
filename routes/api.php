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
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('term', \App\Http\Controllers\SearchTermController::class);
    Route::get('home', function () {
        return response()->json(['OK']);
    });

    Route::get('by-category/{id}', [\App\Http\Controllers\SearchMidController::class, 'fetchByCategory']);
    Route::get('term', [\App\Http\Controllers\SearchTermController::class, 'byFirstLetter']);
    Route::post('login', \App\Http\Controllers\TokenLoginController::class);


    Route::middleware('auth:sanctum')->post('/logout', \App\Http\Controllers\LogoutController::class);

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});


Route::resource('search-log', \App\Http\Controllers\SearchLogController::class);
