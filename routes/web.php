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

/**-----------------------------------
--------------------
--------------------   weilogg.com   ------------------
--------------------
--------------------
-------------------------------------**/

/**----------- weilogg.com homepage ----------------**/
Route::get('/', function () {
    return view('home');
});

/**----------- weilogg.com about page ----------------**/
Route::get('/about', function () {
    return view('about');
});

/**----------- weilogg.com portfolio page ----------------**/
Route::get('/portfolio', function () {
    return view('portfolio');
});

/**----------- weilogg.com resume page ----------------**/
Route::get('/resume', function () {
    return view('resume');
});

/**----------- weilogg.com contact page ----------------**/
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::resource('/blogs', 'weilogg\BlogsController');

// deprecated, replaced by /blogs , BlogsController
Route::get('/blog', 'weilogg\BlogController@show_blog');


/**-----------------------------------
--------------------
--------------------   dishmotion.com   SPA   ------------------
--------------------
--------------------
-------------------------------------**/

// Route::get('/{any}', function () {
//     return view('/dishmotion/dishmotion-home-spa');
// })->where('any','.*');



/**-----------------------------------
--------------------
--------------------   dishmotion.com   ------------------
--------------------
--------------------
-------------------------------------**/


/**----------- dishmotion.com ----------------**/
Route::resource('/dishmotion/home','dishmotion\HomeController');
Route::resource('/dishmotion/orders','dishmotion\OrderController');
Route::resource('/dishmotion/admins','dishmotion\AdminController');


Route::get('/dishmotion/login-admin','Auth\LoginController@show_dishmotion_admin_login');
Route::post('/dishmotion/login-admin','Auth\LoginController@post_dishmotion_admin_login');
Route::get('/dishmotion/logout','Auth\LoginController@dishmotion_logout');


/**-----------------------------------
--------------------
--------------------   gateready.com   ------------------
--------------------
--------------------
-------------------------------------**/

/**----------- gateready.com homepage ----------------**/
Route::resource('/gateready/home','gateready\HomeController');
Route::resource('/gateready/records','gateready\RecordController');
Route::resource('/gateready/admins','gateready\AdminController');

/**----------- gateready.com admin page edit status feature (for AJAX)----------------**/
Route::post('/gateready/admin/edit-status-ajax/{record_reference_number}', 'gateready\AdminController@edit_status_ajax');

/**----------- gateready.com admin page filter tracking number feature (for AJAX)----------------**/
Route::post('/gateready/admin/filter-tracking-number-ajax', 'gateready\AdminController@filter_tracking_number_ajax');






/**-----------------------------------
--------------------
--------------------   wages.com   ------------------
--------------------
--------------------
-------------------------------------**/

Route::resource('/wages/home','wages\HomeController');
Route::resource('/wages/valuations','wages\ValuationController');
Route::resource('/wages/portfolios','wages\PortfolioController');

// Route::resource('/fundamentals','wages\FundamentalsController');

/**----------- wages.com homepage view ----------------**/
// Route::get('/wages', 'wages\HomeController@show_wages');
// Route::get('/wages/{any}', 'wages\HomeController@show_wages');

/**----------- wages.com transaction API ----------------**/
// Route::post('/wages/transaction/api/post-transaction', 'wages\TransactionController@api_post_transaction');
// Route::get('/wages/transaction/api/show-transaction/{field}/{value}', 'wages\TransactionController@api_show_transaction');

/**----------- wages.com cash API ----------------**/
// Route::get('/wages/cash/api/index', 'wages\CashController@index');
// Route::get('/wages/cash/api/show-bank-cash/{field}/{value}', 'wages\CashController@show_bank_cash');
// Route::post('/wages/cash/api/update-cash', 'wages\CashController@update_cash');

/**----------- wages.com watchlist API ----------------**/
// Route::get('/wages/watchlist/api/search-stock/{name}','wages\WatchlistController@api_search_stock');
// Route::get('/wages/watchlist/api/index-watchlist', 'wages\WatchlistController@api_index_watchlist');
// Route::post('/wages/watchlist/api/add-watchlist', 'wages\WatchlistController@api_add_watchlist');
// Route::post('/wages/watchlist/api/update-price', 'wages\WatchlistController@api_update_price');
// Route::delete('/wages/watchlist/api/delete-watchlist/{id}', 'wages\WatchlistController@api_delete_watchlist');
// Route::get('/wages/watchlist/api/show-gis-rank/{id}', 'wages\WatchlistController@api_show_gis_rank');
// Route::post('/wages/watchlist/api/compute-buffett', 'wages\WatchlistController@api_compute_buffett');
// Route::post('/wages/watchlist/api/compute-fisher', 'wages\WatchlistController@api_compute_fisher');

/**----------- wages.com valuation API ----------------**/
// Route::get('/wages/valuation/api/show/{id}', 'wages\ValuationController@show');


/**----------- cron link testing for hosting server ----------------**/
// Route::get('/cron',function(){
//   Artisan::call('cron:tests');
// });

/**----------- get quotes crawl ----------------**/
Route::get('/get-klse-prices','wages\WatchlistController@get_quotes');





/**
**
**  REST API testing
**
**/
Route::get('/records','gateready\RecordController@index');

/**
**
**  AJAX testing
**
**/
Route::get('/test',function(){
	$view = view('welcome')->render();

	return response()->json(['html' => $view]);
});



/**test**/
Route::get('/testing',function(){
    return view('test');
});

Route::post('/testing/a','TestController@test2');


