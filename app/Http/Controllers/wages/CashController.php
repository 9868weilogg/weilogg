<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\wages\BankAccountRepo as BAR;
use App\Repository\wages\CashRepo as CR;


class CashController extends Controller
{
    protected $bar;
    protected $cr;

    public function __construct(BAR $bar,CR $cr)
    {
        $this->bar = $bar;
        $this->cr = $cr;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cash = $this->cr->all();
        $account = $this->bar->all();
        $data[] = array(
        	'cash' => $cash,
        	'acc' => $account,
        );

        return $data[0];
    }





    /**
     * show cash records for selected bank
     *
     */
    public function show_bank_cash($field,$value)
    {
        return response()->json($this->cr->findByField($field,$value),200);
    }


    /**
     * update cash api
     *
     * @param  int  $id
     * @return Response
     */
    public function update_cash(Request $request)
    {
        $cashArray = [];
        $baArray = [];

        $cashArray['description'] = $request->description;
        $cashArray['cash'] = $request->amount;
        $cashArray['bank_accounts_id'] = $request->bank_id;
        $cashArray['flow'] = $request->flow;

        $balance = $this->bar->show($request->bank_id)->balance;
        $flow = $request->flow;
        if($flow == '1')
        {
        	$updated_balance = $balance + $request->amount;
        }
        if($flow == '0')
        {
        	$updated_balance = $balance - $request->amount;
        }
        $baArray['balance'] = $updated_balance;

        $this->bar->update($baArray,$request->bank_id);
        $this->cr->create($cashArray);

        return response()->json('Update Cash Success',201);
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
