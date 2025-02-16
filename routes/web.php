<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Backend Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register backend routes for your application.
  |
 */
Route::get('/', function () {
    return view('welcome');
});


/*
  |--------------------------------------------------------------------------
  | Api Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register api routes for your application.
  |
 */
Route::middleware('api')->group(function () {
    Route::get('/api/news', [NewsController::class, 'searchArticles'])->name('sample-request');
});