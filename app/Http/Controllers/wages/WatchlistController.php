<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\wages\Stock;
use App\wages\Watchlist;

class WatchlistController extends Controller
{
    // API index watchlist VUE
    // 
    // 

    public function api_index_watchlist()
    {
        

    	return Watchlist::all();
        
        // return $stock->code;
    }

    // API show watchlist VUE
    // 
    // 

    public function api_show_watchlist($id)
    {
        

        return Watchlist::where('id',$id)->first();
        
        // return $stock->code;
    }

    // API add watchlist VUE
    // 
    // 

    public function api_add_watchlist(Request $request)
    {
        
    	$id = $request->id;

    	$stock = Stock::where('id',$id)->first();

    	Watchlist::create([
    		'id' => $id,
    		'code' => $stock->code,
    		'name' => $stock->name,
    		'current_price' => $stock->current_price,
    		'share_qty' => $stock->share_qty,
    	]);
        
        // return $stock->code;
    }

    // API add watchlist VUE
    // 
    // 

    public function api_delete_watchlist($id)
    {
        
    	

    	Watchlist::where('id',$id)->delete();

    	
    }

    // watchlist VUE
    // 
    // 

    public function show_watchlist()
    {
        

        return view('wages/wages-watchlist');
    }

}
