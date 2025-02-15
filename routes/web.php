<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//front end api's
Route::middleware('api')->group(function () {
    Route::get('/api/news', [NewsController::class, 'searchArticles']);
});