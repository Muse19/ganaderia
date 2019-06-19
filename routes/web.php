<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'FeedlotController@getAllProfile');
Route::get('/balance', 'FeedlotController@getSimpleBalance');
Route::get('/evolution', 'FeedlotController@getEvolutionBalance');
Route::get('/oscilacion-kg', 'FeedlotController@getOscKg');
Route::get('/oscilacion-percent', 'FeedlotController@getOscPercent');
Route::get('/achievement', 'FeedlotController@getAchievementExpected');


