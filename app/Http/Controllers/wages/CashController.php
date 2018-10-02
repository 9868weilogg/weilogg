<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\wages\Cash;
use App\wages\BankAccount;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cash = Cash::all();
        $account = BankAccount::all();
        $data[] = array(
        	'cash' => $cash,
        	'acc' => $account,
        );

        return $data[0];
        // return Cash::all();
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
        $cash_json = Cash::where('bank_accounts_id',$id)->get();
        $cash_data = json_decode($cash_json,true);
        
        

        
        return $cash_data;
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
     * update cash api
     *
     * @param  int  $id
     * @return Response
     */
    public function update_cash(Request $request)
    {
        
        $amount = $request->amount;
        $description = $request->description;
        $bank_id = $request->bank_id;
        $b = BankAccount::select('balance')->where('id',$request->bank_id)->first();
        $balance = $b->balance;
        $flow = $request->flow;
        if($flow == '1')
        {
        	$updated_balance = $balance + $amount;
        	// $flow = 1;
        	// return $flow;
        }
        if($flow == '0')
        {
        	$updated_balance = $balance - $amount;
        	// $flow = 0;
        	// return $flow;
        }
        BankAccount::where('id',$request->bank_id)->update([
        	'balance' => $updated_balance
    ]);
        Cash::create([
        	'description' => $description,
        	'flow' => $flow,
        	'cash' => $amount,
        	'bank_accounts_id' => $bank_id,
        ]);
   
    	// return $updated_balance;
    }

    /**
     * API end API end API end
     *
     * 
     */

    /**
     * show cash page
     *
     * @param  int  $id
     * @return Response
     */
    public function show_cash()
    {
        

        return view('wages/wages-cash');
    }

    
}
