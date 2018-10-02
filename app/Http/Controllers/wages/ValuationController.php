<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->id = 1;
        $transaction->type = $request->buySell;
        $transaction->unit = $request->unit;
        $transaction->price = $request->price;
        $transaction->stock_id = $request->stock_id;
        $transaction->user_id = 123;
        $transaction->save();

        return response($transaction->jsonSerialize(),201);
        // return ['1','2'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $fundamental_json = file_get_contents("https://api.iextrading.com/1.0/stock/" . $id . "/financials?period=annual");
        $fundamental_data = json_decode($fundamental_json,true);
        // $today_earning_json = file_get_contents("https://api.iextrading.com/1.0/stock/" . $id . "/today-earnings");
        // $today_earning_data = json_decode($today_earning_json,true);
        // $dividends_json = file_get_contents("https://api.iextrading.com/1.0/stock/" . $id . "/dividends/5y");
        // $dividends_data = json_decode($dividends_json,true);
        // $stats_json = file_get_contents("https://api.iextrading.com/1.0/stock/" . $id . "/stats");
        // $stats_data = json_decode($stats_json,true);
        // $return[] = array(
        // 	'fundamental' => $fundamental_data,
        // 	'today_earning' => $today_earning_data,
        // 	'dividends' => $dividends_data,
        //     'stats' => $stats_data,
        // );
        
        // return json_encode($return[0]);
        $return = $fundamental_data['financials'];
        return json_encode($fundamental_data['financials']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Blog::where('id',$id)->update([
            'blog_title' => $request->update_title,
            'blog_post' => $request->update_post,
        ]);

        return response(null,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);

        return response(null,200);
    }

    /**
     * Show Valuation
     *
     * @return Response
     */
    public function show_valuation()
    {
        
        return view('wages/wages-valuation');
    }
}
