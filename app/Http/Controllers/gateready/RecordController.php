<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gateready\Record;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;



class RecordController extends Controller
{
    //  show record page
    public function show_record()
    {
    	//retrieve record data
    	$records = Record::all();
    	
    	if($records->isEmpty())
    	{
    		return view('gateready/record',[
    			'records' => $records,
    		]);
    	}else
    	{
    		foreach ($records as $record)
		    {
		    	$status[$record->reference_number] = Record::find($record->reference_number)->status;
		    	$time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
				
		    }

		    return view('gateready/record',[
				'records' => $records,
			  	'status' => $status,
		    	'time_range' => $time_range,
		   ]);
    	}
    	
    	
    	
    }

    //  show schedule delivery page
    public function show_schedule_delivery()
    {
    	return view('gateready/schedule-delivery');
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
    		return Redirect::to('gateready/record/schedule-delivery')->withErrors($validator)->withInput();
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

    //  show schedule delivery page
    public function show_reschedule_delivery(Request $request, $record_reference_number)
    {
    	return view('gateready/reschedule-delivery',[
    		'record_reference_number' => $record_reference_number,
    	]);
    }

    //  reschedule the date and time of delivery
    public function post_reschedule_delivery(Request $request, $record_reference_number)
    {
    	// echo "$record_reference_number";
    	//  validate
    	$validator = Validator::make(Input::all(),[
    		'schedule_date' => 'required',
    		'time_range_id' => 'required',
    	]);

    	//  if validation fail
    	if($validator->fails())
    	{
    		return Redirect::to('/gateready/record/reschedule-delivery/',['record_reference_number' => $record_reference_number,])->withErrors($validator)->withInput();
    	}
    	else
    	{
    		
    		Record::where('reference_number',$record_reference_number)->update([
    			'schedule_date' => Input::get('schedule_date'),
    			'time_range_id' => Input::get('time_range_id'),
    		]);

    		return Redirect::to('gateready/record');
    	}
    }
}
