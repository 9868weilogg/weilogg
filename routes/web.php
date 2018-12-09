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

//     1 website cannot have login twice 
// /**----------- gateready.com login page ----------------**/
// Route::get('/gateready/login', 'Auth\LoginController@show_gateready_login');

// Route::get('/gateready/logout', 'Auth\LoginController@gateready_logout');

// Route::post('/gateready/login', 'Auth\LoginController@post_gateready_login');

// /**----------- gateready.com register page ----------------**/
// Route::get('/gateready/register', 'Auth\RegisterController@show_gateready_register');

// Route::post('/gateready/register', 'Auth\RegisterController@gateready_register');

/**----------- gateready.com record page ----------------**/
// Route::get('/gateready/record/{user_id}', 'gateready\RecordController@show_record');

// /**----------- gateready.com testing code generator page ----------------**/
// Route::get('/gateready/code-generator', 'gateready\RecordController@insert_gateready_user_id');


/**----------- gateready.com schedule delivery page ----------------**/
// Route::get('/gateready/record/{user_id}/schedule-delivery', 'gateready\RecordController@show_schedule_delivery');

// Route::post('/gateready/record/{user_id}/schedule-delivery', 'gateready\RecordController@post_schedule_delivery');

/**----------- gateready.com print invoice page ----------------**/
// Route::get('/gateready/record/{user_id}/invoice/{record_reference_number}', 'gateready\RecordController@print_invoice');

/**----------- gateready.com print receipt page ----------------**/
// Route::get('/gateready/record/{user_id}/receipt/{record_reference_number}', 'gateready\RecordController@print_receipt');

/**----------- gateready.com reschedule delivery page ----------------**/
// Route::get('/gateready/record/{user_id}/reschedule-delivery/{record_reference_number}', 'gateready\RecordController@show_reschedule_delivery');

// Route::post('/gateready/record/{user_id}/reschedule-delivery/{record_reference_number}', 'gateready\RecordController@post_reschedule_delivery');

/**----------- gateready.com feedback delivery page ----------------**/
// Route::get('/gateready/record/{user_id}/feedback/{record_reference_number}', 'gateready\RecordController@show_feedback');

// Route::post('/gateready/record/{user_id}/feedback/{record_reference_number}', 'gateready\RecordController@post_feedback');

// /**----------- gateready.com admin page ----------------**/
// Route::get('/gateready/admin', 'gateready\AdminController@show_admin');

// /**----------- gateready.com admin page edit status feature ----------------**/
// Route::post('/gateready/admin/edit-status/{record_reference_number}', 'gateready\AdminController@edit_status');

// /**----------- gateready.com admin page show all record feature ----------------**/
// Route::get('/gateready/admin/show-all-records', 'gateready\AdminController@show_all_records');

// /**----------- gateready.com admin page show all record feature (for AJAX) ----------------**/
// Route::get('/gateready/admin/show-all-records-ajax', 'gateready\AdminController@show_all_records_ajax');

// /**----------- gateready.com admin page filter today record feature ----------------**/
// Route::get('/gateready/admin/show-today-records', 'gateready\AdminController@show_today_records');

// /**----------- gateready.com admin page filter today record feature (for AJAX) ----------------**/
// Route::get('/gateready/admin/show-today-records-ajax', 'gateready\AdminController@show_today_records_ajax');

// /**----------- gateready.com admin page filter today delivery feature ----------------**/
// Route::get('/gateready/admin/show-today-delivery', 'gateready\AdminController@show_today_delivery');

// /**----------- gateready.com admin page filter today delivery feature (for AJAX)----------------**/
// Route::get('/gateready/admin/show-today-delivery-ajax', 'gateready\AdminController@show_today_delivery_ajax');

// /**----------- gateready.com admin page filter today remaining delivery feature ----------------**/
// Route::get('/gateready/admin/show-today-remaining-delivery', 'gateready\AdminController@show_today_remaining_delivery');

// /**----------- gateready.com admin page filter today remaining delivery feature (for AJAX) ----------------**/
// Route::get('/gateready/admin/show-today-remaining-delivery-ajax', 'gateready\AdminController@show_today_remaining_delivery_ajax');


// /**----------- gateready.com admin page filter tracking number feature ----------------**/
// Route::get('/gateready/admin/filter-tracking-number', 'gateready\AdminController@filter_tracking_number');




/**-----------------------------------
--------------------
--------------------   wages.com   ------------------
--------------------
--------------------
-------------------------------------**/



/**----------- wages.com homepage ----------------**/
// Route::post('/wages1', 'wages\HomeController@search');

/**----------- wages.com update price in watchlist ----------------**/
// Route::get('/wages1/update-price', 'wages\HomeController@show_price');

Route::resource('/fundamentals','wages\FundamentalsController');

/**----------- wages.com homepage view ----------------**/
Route::get('/wages', 'wages\HomeController@show_wages');
Route::get('/wages/{any}', 'wages\HomeController@show_wages');

/**----------- wages.com transaction API ----------------**/
Route::post('/wages/transaction/api/post-transaction', 'wages\TransactionController@api_post_transaction');
Route::get('/wages/transaction/api/show-transaction/{field}/{value}', 'wages\TransactionController@api_show_transaction');

/**----------- wages.com cash API ----------------**/
Route::get('/wages/cash/api/index', 'wages\CashController@index');
Route::get('/wages/cash/api/show-bank-cash/{field}/{value}', 'wages\CashController@show_bank_cash');
Route::post('/wages/cash/api/update-cash', 'wages\CashController@update_cash');

/**----------- wages.com watchlist API ----------------**/
Route::get('/wages/watchlist/api/search-stock/{name}','wages\WatchlistController@api_search_stock');
Route::get('/wages/watchlist/api/index-watchlist', 'wages\WatchlistController@api_index_watchlist');
Route::post('/wages/watchlist/api/add-watchlist', 'wages\WatchlistController@api_add_watchlist');
Route::post('/wages/watchlist/api/update-price', 'wages\WatchlistController@api_update_price');
Route::delete('/wages/watchlist/api/delete-watchlist/{id}', 'wages\WatchlistController@api_delete_watchlist');
Route::get('/wages/watchlist/api/show-gis-rank/{id}', 'wages\WatchlistController@api_show_gis_rank');
Route::post('/wages/watchlist/api/compute-buffett', 'wages\WatchlistController@api_compute_buffett');
Route::post('/wages/watchlist/api/compute-fisher', 'wages\WatchlistController@api_compute_fisher');

/**----------- wages.com valuation API ----------------**/
Route::get('/wages/valuation/api/show/{id}', 'wages\ValuationController@show');




/**----------- wages.com home in VUE ----------------**/
/**----------- wages.com home API ----------------**/
// Route::get('/wages/api/show-eod/{id}', 'wages\HomeController@api_show_eod');

/**----------- wages.com valuation with VUE ----------------**/
// Route::get('/wages/valuation', 'wages\ValuationController@show_valuation');

/**----------- wages.com valuation with VUE ----------------**/
/**----------- wages.com show valuation API ----------------**/
// 

/**----------- wages.com upload fundamental API ----------------**/
// Route::post('/wages/valuation/api/upload-fundamental', 'wages\ValuationController@upload_fundamental');

/**----------- wages.com watchlist with VUE ----------------**/
/**----------- wages.com index watchlist API ----------------**/


/**----------- wages.com index watchlist API ----------------**/
// Route::get('/wages/watchlist/api/show-watchlist/{id}', 'wages\WatchlistController@api_show_watchlist');

/**----------- wages.com add watchlist API ----------------**/


/**----------- wages.com delete watchlist API ----------------**/


/**----------- wages.com show gis rank API ----------------**/


/**----------- wages.com compute buffett API ----------------**/


/**----------- wages.com compute fisher API ----------------**/
// 

/**----------- wages.com watchlist with VUE ----------------**/
// Route::get('/wages/watchlist', 'wages\WatchlistController@show_watchlist');

/**----------- wages.com transaction with VUE ----------------**/
// Route::get('/wages/transaction', 'wages\TransactionController@show_transaction');



/**----------- wages.com parse transaction API with VUE ----------------**/
// Route::get('/wages/transaction/api', 'wages\TransactionController@api_show_transaction');

/**----------- wages.com cash with VUE ----------------**/
/**----------- wages.com cash with VUE ----------------**/
// Route::get('/wages/cash', 'wages\CashController@show_cash');

/**
**
**  run background to insert EOD data
**
**/
// Route::get('/wages/eod', 'wages\HomeController@eod_insert');

/**
**
**  crawler testing (tutorial get data in a page)
**
**/
// Route::get('/check-quotes','wages\WatchlistController@get_quotes');



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

/**
**
**  crawler testing (tutorial get links in a page)
**
**/
// Route::get('/crawler','wages\WatchlistController@crawler');


/**test**/
Route::get('/testing',function(){
    return view('test');
});

Route::post('/testing/a','TestController@test2');


