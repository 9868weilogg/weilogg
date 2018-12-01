<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\wages\TransactionRepo;

class TransactionController extends Controller
{
    protected $tr ;

    public function __construct(TransactionRepo $transaction)
    {
        $this->tr = $transaction;
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

    public function api_show_transaction($field, $value)
    {
        return $this->tr->findByField($field,$value);
    }

    

    /**
     * post transaction.
     *
     * @return Response
     */
    public function api_post_transaction(Request $request)
    {
        $tx = [];
        $tx['id'] = '2';
        $tx['type'] = $request->type;
        $tx['unit'] = $request->unit;
        $tx['price'] = $request->price;
        $tx['stock_id'] = $request->stock_id;
        $tx['user_id'] = $request->user_id;
        $tx['gross_amount'] = $request->gross_amount;
        $tx['brokerage'] = $request->brokerage;
        $tx['clearing_fee'] = $request->clearing_fee;
        $tx['sst_payable'] = $request->sst_payable;
        $tx['stamp_duty'] = $request->stamp_duty;
        $tx['total_amount_due'] = $request->total_amount_due;
        $tx['payment_due_date'] = $request->payment_due_date;

        $this->tr->create($tx);
        // return $tx;

        return response('submit success',201);
    }
}
