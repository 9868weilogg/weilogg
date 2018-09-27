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

/**
**
**   REST API testing
**
**/

Route::apiResource('records','RecordController');

/**
**
**   REST API weilogg.com/blog
**
**/

Route::resource('/blog','weilogg\BlogController');




