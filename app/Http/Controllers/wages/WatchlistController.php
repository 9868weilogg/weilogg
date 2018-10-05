<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\wages\Stock;
use App\wages\Watchlist;
use App\wages\GisRank;

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

    // API show GisRank VUE
    // 
    // 

    public function api_show_gis_rank($id)
    {
        
        

        return GisRank::where('stock_id',$id)->first();

        
    }

    // API compute buffett VUE
    // 
    // 

    public function api_compute_buffett(Request $request)
    {
        $id = $request->stock_id;

        $a = GisRank::where('stock_id',$id)->first();

        if($a != null){
            GisRank::where('stock_id',$id)->update([
                'ba1' => $request->ba1 ,
                'ba1_1' => $request->ba1_1 ,
                'ba1_2' => $request->ba1_2 ,
                'ba1_3' => $request->ba1_3 ,
                'ba1_4' => $request->ba1_4 ,
                'ba1_5' => $request->ba1_5 ,
                'ba2' => $request->ba2 ,
                'ba3' => $request->ba3 ,
                'ba4' => $request->ba4 ,
                'ba5' => $request->ba5 ,
                'ba6' => $request->ba6 ,
                'ba7' => $request->ba7 ,
                'buffettMark' => $request->buffettMark,
            ]);
        }
        else{
            GisRank::create([
                'stock_id' => $id,
                'ba1' => $request->ba1 ,
                'ba1_1' => $request->ba1_1 ,
                'ba1_2' => $request->ba1_2 ,
                'ba1_3' => $request->ba1_3 ,
                'ba1_4' => $request->ba1_4 ,
                'ba1_5' => $request->ba1_5 ,
                'ba2' => $request->ba2 ,
                'ba3' => $request->ba3 ,
                'ba4' => $request->ba4 ,
                'ba5' => $request->ba5 ,
                'ba6' => $request->ba6 ,
                'ba7' => $request->ba7 ,
                'buffettMark' => $request->buffettMark,
                
            ]);
        }

        
    }

    // API compute fisher VUE
    // 
    // 

    public function api_compute_fisher(Request $request)
    {
        $id = $request->stock_id;

        $a = GisRank::where('stock_id',$id)->first();

        if($a != null){
            GisRank::where('stock_id',$id)->update([
                'fa1' => $request->fa1 ,
                'fa2' => $request->fa2 ,
                'fa3' => $request->fa3 ,
                'fa4' => $request->fa4 ,
                'fa5' => $request->fa5 ,
                'fa6' => $request->fa6 ,
                'fa7' => $request->fa7 ,
                'fisherMark' => $request->fisherMark,
            ]);
        }
        else{
            GisRank::create([
                'stock_id' => $id,
                'fa1' => $request->fa1 ,
                'fa2' => $request->fa2 ,
                'fa3' => $request->fa3 ,
                'fa4' => $request->fa4 ,
                'fa5' => $request->fa5 ,
                'fa6' => $request->fa6 ,
                'fa7' => $request->fa7 ,
                'fisherMark' => $request->fisherMark,
                
            ]);
        }

        
    }

    // watchlist VUE
    // 
    // 

    public function show_watchlist()
    {
        

        return view('wages/wages-watchlist');
    }

}
