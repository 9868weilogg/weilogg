<?php

namespace App\Http\Controllers\dishmotion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\dishmotion\Order;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
  
  public function index(Request $request) {
    dd('a');
    if($request->filter_order == "1") {
      $data = $this->filter_order($request);
      $orders = $data['orders'];
      return view('dishmotion/admin/admin',compact('orders'));
    } else {
      $orders = Order::all();

      return view('dishmotion/admin/admin',compact('orders'));
    }
  }  

    //  get admin page after log in successful, then retrieve data from orders-table
	public function get_order_summary()
	{
		$order = Order::all();
		

		return view('dishmotion/admin/admin',[
			'orders' => $order,
		
	]);
		
	}

	//  filter orders based on selected period of time
	public function filter_order($request)
	{
		$start_date = $request->start_date;
		$end_date = $request->end_date;

		$orders = Order::all()->where('created_at','>=',$start_date)->where('created_at','<',$end_date)->all();
		$total_order = count($orders);
		//  print json_encode($order); 
		//echo "$total_order";
		return ['orders' => $orders, 'total_order' => $total_order];
	}
}
