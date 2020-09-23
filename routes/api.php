<?php

use Illuminate\Http\Request;

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
Route::middleware(['jwt', 'api'])->get('/movies/genres', 'Api\GenreController@index');  
Route::middleware(['jwt', 'api'])->get('/movies/genre', 'Api\MovieController@getByGenres');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('register', 'Auth\RegisterController@create');
});
Route::middleware(['jwt', 'api'])->group(function ()  {
    Route::resource('/movies/comments', 'Api\CommentController');
});
Route::middleware(['jwt', 'api'])->group(function ()  {
    Route::resource('movies', 'Api\MovieController');
});

