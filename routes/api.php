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

Route::resource('school', 'SchoolInfoController', ['only' => ['index', 'show']]);
Route::resource('scoreline_major', 'ScorelineMajorController', ['only' => ['index']]);
Route::resource('school_news', 'SchoolNewsController', ['only' => ['index']]);
Route::resource('school_major', 'SchoolMajorController', ['only' => ['index']]);
Route::resource('school_content', 'SchoolContentController', ['only' => ['index']]);
Route::resource('school_ask', 'SchoolAskController', ['only' => ['index']]);
Route::resource('scoreline_prov', 'ScorelineProvController', ['only' => ['index']]);
