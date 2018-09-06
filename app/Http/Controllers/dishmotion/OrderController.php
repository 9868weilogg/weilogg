<?php

namespace App\Http\Controllers\dishmotion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\dishmotion\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        echo "hellow world";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // return page that notify validation fail with errors
        return view('dishmotion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate with rules
        $rules = array(
            'name' => 'required',
            'contact' => 'required',
            'menu' => 'required',
            'quantity' => 'required|numeric',
            'kolej' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // valiation logic
        if($validator->fails())
        {
            // fast test
            //echo "Validation Fail, Try Again";
            // proper way
            return Redirect::to('dishmotion/orders/create')->withErrors($validator);
        }
        else
        {
            // store data
            $order = new Order;
            $order->menu = Input::get('menu');
            $order->name = Input::get('name');
            $order->contact = Input::get('contact');
            $order->quantity = Input::get('quantity');
            $order->kolej = Input::get('kolej');
            $order->save();

            

            // redirect

            return view('dishmotion/confirmed-order',[
            	'orders' => $order 
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        echo "$order";
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
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
