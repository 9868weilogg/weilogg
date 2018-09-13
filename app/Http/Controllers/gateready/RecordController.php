<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gateready\Record;
use App\gateready\Package;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Traits\CodeGenerator;
use App\User;
use PDF;
use App\Http\Resources\RecordResource;



class RecordController extends Controller
{
    //  insert traits code that reusable (Code Generator)
    use CodeGenerator;

    //  show record page
    public function show_record($user_id)
    {

    	//retrieve record data
    	$records = Record::all()->where('gateready_user_id',$user_id);
    	
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
				$package[$record->package_id] = Package::find($record->package_id);
				$user[$record->gateready_user_id] = User::find($record->gateready_user_id);
				$payment = $user[$record->gateready_user_id]->credit - $package[$record->package_id]->price ;
		    }

		    return view('gateready/record',[
				'records' => $records,
			  	'status' => $status,
		    	'time_range' => $time_range,
		    	'package' => $package,
		    	'user' => $user,
		    	'payment' => $payment,
		   ]);
    	}
    	
    	
    	
    }

    //  show schedule delivery page
    public function show_schedule_delivery($user_id)
    {
    	return view('gateready/schedule-delivery',[
    		'user_id' => $user_id,
    	]);
    }

    //  post schedule delivery 
    public function post_schedule_delivery(Request $request,$user_id)
    {
    	// validate input
    	$validator = Validator::make($request->all(),[
    		'user_id' => 'required',
    		'schedule_date' => 'required',
    		'package_id' => 'required',
    		'tracking_number' => 'required',
    		'courier_id' => 'required',
    		'time_range_id' => 'required',
    	]);

    	//  if validation fail
    	if($validator->fails())
    	{
    		return Redirect::to('gateready/record/'. $user_id . '/schedule-delivery')->withErrors($validator)->withInput();
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
    		$record->reference_number = $this->generate_code('reference_number');
    		// hard code for testing - database set to be not null
    		
    		$record->status_id = 2;
    		$record->message = 'nil';
    		$record->save();

    		


    		return Redirect::to('/gateready/record/'. $user_id ,[

    		]);
    	}
    }

    //  show schedule delivery page
    public function show_reschedule_delivery(Request $request, $user_id, $record_reference_number)
    {
    	return view('gateready/reschedule-delivery',[
    		'record_reference_number' => $record_reference_number,
    	]);
    }

    //  reschedule the date and time of delivery
    public function post_reschedule_delivery(Request $request, $user_id, $record_reference_number)
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
    		return Redirect::to('/gateready/record/'. $user_id .'/reschedule-delivery/'.$record_reference_number)->withErrors($validator)->withInput();
    	}
    	else
    	{
    		// echo Input::get('schedule_date');
    		// echo $record_reference_number;
    		// echo $user_id;
    		Record::where([
    			'reference_number' => $record_reference_number,
    			'gateready_user_id' => $user_id,
    		])->update([
    			'schedule_date' => Input::get('schedule_date'),
    			'time_range_id' => Input::get('time_range_id'),
    		]);

    		return Redirect::to('gateready/record/'.$user_id);
    	}
    }

    //  show feedback page
    public function show_feedback(Request $request, $user_id, $record_reference_number)
    {
    	return view('gateready/feedback',[
    		'user_id' => $user_id,
    		'record_reference_number' => $record_reference_number,

    	]);
    	// echo "$record_reference_number";
    }

    //  post feedback
    public function post_feedback(Request $request, $user_id, $record_reference_number)
    {
    	// echo "$record_reference_number";
    	//  validate the input
    	$validator = Validator::make(Input::all(),[
    		'msg' => 'required',
    	]);

    	//  if validator fail
    	if($validator->fails())
    	{
    		return Redirect::to('gateready/record/' .$user_id .'/feedback/'. $record_reference_number)->withErrors($validator);
    		// echo "$record_reference_number";

    	}
    	else
    	{
    		Record::where([
    			'gateready_user_id' => $user_id,
    			'reference_number' => $record_reference_number,
    		])->update([
    			
    			'message' => Input::get('msg'),
    		]);
    		return Redirect::to('gateready/record/'.$user_id);
    	}
    }

    /****
    ***
    ***   generate random code
    ***
    ***/
    public function insert_gateready_user_id()
    {
    	// $code = $this->generate_code('');
    	// echo $code;
    }

    /****
    ***
    ***   print invoice
    ***   Display a listing of resource.
    ***   @return \Illuminate\Http\Response
    ***
    ***/
    public function print_invoice($user_id,$record_reference_number)
    {
    	$data = ['title' => 'Invoice'];
    	$pdf = PDF::loadView('/gateready/invoice',$data);
    	

    	return $pdf->download('invoice.pdf');
    }

    /****
    ***
    ***   print receipt
    ***   Display a listing of resource.
    ***   @return \Illuminate\Http\Response
    ***
    ***/
    public function print_receipt($user_id,$record_reference_number)
    {
    	$data = ['title' => 'Receipt'];
    	$pdf = PDF::loadView('/gateready/receipt',$data);

    	return $pdf->download('receipt.pdf');
    }


    /***  
    ***
    ***  REST API testing
    ***
    ***/
    public function index()
    {
        // return RecordResource::collection(Record::all());
        return Record::all();
    }
}
