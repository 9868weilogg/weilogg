<?php

namespace App\Http\Controllers\dishmotion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\dishmotion\Order;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    

    //  get admin page after log in successful, then retrieve data from orders-table
	public function get_order_summary()
	{
		$order = Order::all();
		

		return view('dishmotion/admin/admin',[
			'orders' => $order,
		
	]);
		
	}

	//  filter orders based on selected period of time
	public function filter_order()
	{
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');

		$order = Order::all()->where('created_at','>=',$start_date)->where('created_at','<',$end_date)->all();
		$total_order = count($order);
		
		//  print json_encode($order); 
		//echo "$total_order";
		return view('dishmotion/admin/admin',[
			'orders' => $order,
			//'total_order' => $total_order
		]);
		
	}
}
