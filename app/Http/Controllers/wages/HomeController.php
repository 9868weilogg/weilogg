<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\wages\Stock;

class HomeController extends Controller
{
    // homepage
    // 
    // 

    public function index()
    {
    	$stocks = Stock::all();
    	
    	return view('wages/wages-home',[
    		'stocks' => $stocks,
    	]);
    }

    // parse data
    // 
    // 

    public function search(Request $request){
    	$stock_key = Input::get('stock_key');
    	$data_json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=' .$stock_key. '&outputsize=compact&apikey=PVVY41A3AOTEE26O');
    	$data_collection = json_decode($data_json,true);
    	
    	$view = view('wages/search-result',[
    		'quotes' => $data_collection,
    	])->render();
    	// return response()->json(['html' => $view]);
    	return $view;
    	// return $stock_key;
    }

    // update stock price
    // 
    // 

    public function show_price(Request $request)
    {
    	$stock_id = $request->id;
    	// $stock_id = "1155";
    	$stock_id_kl = $stock_id . '.kl';
    	
    	$data_json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=' .$stock_id_kl. '&outputsize=compact&apikey=PVVY41A3AOTEE26O');
    	$data_collection = json_decode($data_json,true);

    	$updated_date = $data_collection['Meta Data']['3. Last Refreshed'];
    	$current_price = $data_collection['Time Series (Daily)'][$updated_date]['4. close'];
    	$current_price_text = 'RM ' . $current_price;

    	// Stock::where('id',$stock_id)->update('current_price',$current_price);
    	// echo $current_price;
    	return response()->json(['html' => $current_price_text]);
    	// return view('wages/wages-home',[
    	// 	'stocks' => $stocks,
    	// ]);
    }
}
