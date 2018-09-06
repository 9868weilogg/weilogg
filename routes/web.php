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

/**----------- weilogg.com homepage ----------------**/
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**----------- dishmotion.com homepage ----------------**/
Route::get('/dishmotion', function () {
    return view('/dishmotion/dishmotion-home');
});

/**----------- dishmotion.com soup page ----------------**/
Route::get('/dishmotion/soup', function () {
    return view('/dishmotion/soup');
});

/**----------- dishmotion.com order pages ----------------**/
Route::resource('/dishmotion/orders','dishmotion\OrderController');

/**----------- dishmotion.com admin pages ----------------**/
Route::get('/dishmotion/admin','dishmotion\AdminController@get_order_summary');

/**----------- dishmotion.com admin page sort order based on range of date ----------------**/
Route::get('/dishmotion/filter_order','dishmotion\AdminController@filter_order');

/**----------- dishmotion.com login pages ----------------**/

Route::get('/dishmotion/login-admin','Auth\LoginController@show_dishmotion_admin_login');

Route::post('/dishmotion/login-admin','Auth\LoginController@post_dishmotion_admin_login');

Route::get('/dishmotion/logout','Auth\LoginController@dishmotion_logout');
