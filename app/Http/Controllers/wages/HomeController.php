<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\wages\Stock;
use App\wages\Transaction;
use App\wages\EOD;
use App\wages\Watchlist;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        return Stock::all();
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
        // $transaction = new Transaction();
        // $transaction->id = 1;
        // $transaction->type = $request->buySell;
        // $transaction->unit = $request->unit;
        // $transaction->price = $request->price;
        // $transaction->stock_id = $request->stock_id;
        // $transaction->user_id = 123;
        // $transaction->save();

        // return response($transaction->jsonSerialize(),201);
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
        return Stock::where('name','LIKE','%'.$id.'%')->get();
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }

    /**
     * show API 3A EOD
     *
     * @param  int  $id
     * @return Response
     */
    public function api_show_eod($id)
    {
        return EOD::select('stock_id','last_refreshed','date','open','high','low','close','volume')->where('stock_id',$id)->get();
    }


    

    /**
     * update price of stock into database
     *
     * @return Response
     */
    public function eod_insert()
    {
        $stocks = Watchlist::all();
        foreach($stocks as $stock)
        {
            $stock_data = '';
            $json_data = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=' . $stock->id . '.kl&outputsize=full&apikey=PVVY41A3AOTEE26O');
            if(key(json_decode($json_data,true)) == 'Error Message')
            {
                echo $stock->id;
                $stock_data = 'N/A';

                echo $stock_data;
                sleep(30);
            }
            else
            {
                $stock_id = $stock->id;

                $json = json_decode($json_data,true);
                $last_refreshed = $json['Meta Data']['3. Last Refreshed'] ;
                $symbol = $json['Meta Data']['2. Symbol'];
                $stock_data = $json['Time Series (Daily)'];
                $current_price = $json['Time Series (Daily)'][$last_refreshed]['4. close'];
                Watchlist::where('id',$stock_id)->update([
                    'current_price' => $current_price,
                ]);

                 /**
                    **
                    **  update alpha vantage full stocks's EOD
                    **
                    **/
                
                foreach($stock_data as $key => $value)
                {
                    if(EOD::where([
                        ['stock_id','=', $stock_id],
                        ['last_refreshed', '=', $last_refreshed],
                        ['date', '=', $key],
                    ])->count()>0){
                        EOD::where([
                            ['stock_id','=', $stock_id],
                            ['last_refreshed', '=', $last_refreshed],
                            ['date', '=', $key],
                        ])->update([
                            
                            'open' =>$value['1. open'],
                            'high' =>$value['2. high'],
                            'low' =>$value['3. low'],
                            'close' =>$value['4. close'],
                            'volume' =>$value['5. volume'],
                        ]);
                    }
                    else
                    {
                        EOD::create([
                            'stock_id' => $stock_id,
                            'last_refreshed' => $last_refreshed,
                            'date' => $key,
                            'open' =>$value['1. open'],
                            'high' =>$value['2. high'],
                            'low' =>$value['3. low'],
                            'close' =>$value['4. close'],
                            'volume' =>$value['5. volume'],
                        ]);
                    }
                    
                }
                sleep(30);
            }
            
            // echo $stock->id.'\n\n\n';
        }
        return "EOD update complete"; 
       


    }

    /**
     * show wages homepage
     *
     * @param  int  $id
     * @return Response
     */
    public function show_wages()
    {
        return view('wages/wages-home');
    }
}
