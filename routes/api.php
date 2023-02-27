<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ArticleController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'articles'], function () {
    //Get data from newsapi website
    Route::group(['prefix' => 'news-api'], function () {
        Route::get('', [ArticleController::class, 'getNewsAPIData']);
        Route::get('sources', [ArticleController::class, 'getNewsAPISources']);
    });

    //Get data from the Guardian website
    Route::group(['prefix' => 'the-guardian'], function () {
        Route::get('', [ArticleController::class, 'getTheGuardianData']);
        Route::get('sections', [ArticleController::class, 'getTheGuardianSections']);
    });

    //Get data from the Newyork times website
    Route::group(['prefix' => 'nytimes'], function () {
        Route::get('', [ArticleController::class, 'getNyTimesData']);
    });
});
