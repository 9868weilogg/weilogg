<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gateready\Record;
use App\gateready\Courier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class ScheduleDeliveryController extends Controller
{
    //  show schedule delivery page
    public function index()
    {
    	$couriers = Courier::all();
        return view('gateready/schedule-delivery',[
            'couriers' => $couriers,
        ]);
    }

    //  post schedule delivery 
    public function post_schedule_delivery(Request $request)
    {
    	// validate input
    	$validator = Validator::make($request->all(),[
    		'user_id' => 'required|numeric',
    		'schedule_date' => 'required',
    		'package_id' => 'required',
    		'tracking_number' => 'required',
    		'courier_id' => 'required',
    		'time_range_id' => 'required',
    	]);

    	//  if validation fail
    	if($validator->fails())
    	{
    		return Redirect::to('gateready/schedule-delivery')->withErrors($validator)->withInput();
    	}
    	else
    	{
    		$record = new Record;
    		$record->gateready_user_id = Input::get('user_id');
    		$record->tracking_number = Input::get('tracking_number');
    		$record->courier_id = Input::get('courier_id');
    		$record->package_id = Input::get('package_id');
    		$record->schedule_date = Input::get('schedule_date');
    		$record->time_range_id = Input::get('time_range_id');

    		// hard code for testing - database set to be not null
    		$record->reference_number = '1234';
    		$record->status_id = 2;
    		$record->message = 'nil';
    		$record->save();

    		return Redirect::to('/gateready/record');
    	}
    }
}
