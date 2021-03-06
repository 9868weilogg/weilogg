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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['midleware' => ['cors']], function() {
  Route::post('login', 'api\UserController@login');
  Route::post('register', 'api\UserController@register');
// });

Route::middleware('auth:api')->resource('blogs','api\BlogController');
// Route::group(['midleware' => ['api', 'cors']], function() {
//   Route::resource('blogs','api\BlogController');
// });

/**
**
**   REST API testing
**
**/

// Route::apiResource('records','RecordController');

/**
**
**   REST API weilogg.com/blog
**
**/

Route::resource('/blog','weilogg\BlogController');

/**
**
**   REST API weilogg.com/wages
**
**/

Route::resource('/wages','wages\HomeController');








