<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\wages\Stock;
use App\wages\Transaction;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $this->updatePrice();
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

    

    // homepage
    // 
    // 

    public function index1()
    {
    	$stocks = Stock::all();
    	$title = 'Laravel parse title';
    	$author = json_encode([
    		"name" => "logg",
    		"role" => "lol",
    		"code" => "1",
    	]);

    	return view('wages/wages-home',[
    		'stocks' => $stocks,
    		'title' =>  $title,
    		'author' => $author,
    		
    	]);
    }

    // watchlist VUE
    // 
    // 

    public function show_watchlist()
    {
        

        return view('wages/wages-watchlist');
    }

    // transaction VUE
    // 
    // 

    public function show_transaction()
    {
        

        return view('wages/wages-transaction');
    }

    // parse transaction VUE
    // 
    // 

    public function api_show_transaction()
    {
        $transactions = Transaction::all();

        foreach($transactions as $transaction)
        {
            $records[] = array(
                'id' => $transaction->id,
                'stock_id' => $transaction->stock_id,
                'name' => Stock::select('name')->where('id',$transaction->stock_id)->first(),
                'type' => $transaction->type,
                'price' => $transaction->price,
                'unit' => $transaction->unit,
                'gross_amount' => $transaction->gross_amount,
                'brokerage' => $transaction->brokerage,
                'clearing_fee' => $transaction->clearing_fee,
                'sst_payable' => $transaction->sst_payable,
                'stamp_duty' => $transaction->stamp_duty,
                'total_amount_due' => $transaction->total_amount_due,
                'payment_due_date' => $transaction->payment_due_date,
            );
        }

        return $records;
        // return Stock::select('name')->where('id','AAPL')->get();
    }

    
    /**
     * update price of stock into database
     *
     * @return Response
     */
    public function updatePrice()
    {
        
        
        $stocks = Stock::all();
        foreach($stocks as $stock)
        {
            
            $json_data = file_get_contents('https://api.iextrading.com/1.0/stock/' . $stock->id . '/ohlc');
            $json = json_decode($json_data,true);
            $stock_data = $json['close']['price'];
            
            Stock::where('id',$stock->id)->update(['current_price' => $stock_data]);    
        }

        
    }

    /**
     * post transaction.
     *
     * @return Response
     */
    public function post_transaction(Request $request)
    {
        $transaction = new Transaction;
        $transaction->id = '2';
        $transaction->type = $request->type;
        $transaction->unit = $request->unit;
        $transaction->price = $request->price;
        $transaction->stock_id = $request->stock_id;
        $transaction->user_id = '123';
        $transaction->gross_amount = $request->gross_amount;
        $transaction->brokerage = $request->brokerage;
        $transaction->clearing_fee = $request->clearing_fee;
        $transaction->sst_payable = $request->sst_payable;
        $transaction->stamp_duty = $request->stamp_duty;
        $transaction->total_amount_due = $request->total_amount_due;
        $transaction->payment_due_date = $request->payment_due_date;
        $transaction->save();
        // $transaction = Transaction::create([
        //     'id' => '1',
        //     'type' => '1',//$request->type,
        //     'unit' => 1,//$request->unit,
        //     'price' => 1,//$request->price,
        //     'stock_id' => '1',//$request->stock_id,
        //     'user_id' => '123',
        // ]);

        return response($transaction->jsonSerialize(),201);
        // return $request->type;
    }
}
