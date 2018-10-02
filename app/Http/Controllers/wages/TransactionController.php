<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
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

        return response($transaction->jsonSerialize(),201);
    }
}
