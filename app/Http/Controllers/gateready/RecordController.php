<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use App\Http\Traits\CodeGenerator;
use App\Http\Resources\RecordResource;

use App\gateready\Record;
use App\gateready\Package;
use App\gateready\Courier;
use App\gateready\TimeRange;
use App\User;

use Auth;
use PDF;



class RecordController extends Controller
{
    //  insert traits code that reusable (Code Generator)
    use CodeGenerator;

    public function index(Request $request) {
      
      $data = Record::show_record(Auth::user()->id);
      $records = $data['records'];
      $status = $data['status'];
      $time_range = $data['time_range'];
      $package = $data['package'];
      $user = $data['user'];
      $payment = $data['payment'];
      
      return view('gateready/record',compact('records','time_range','package','user','payment','status'));
    
    
    }

    public function create(Request $request) {
      if($request->schedule_delivery) {
        $data = Record::show_schedule_delivery(Auth::user()->id);
        $couriers = $data['couriers'];
        $time_ranges = $data['time_ranges'];

        return view('gateready/schedule-delivery',compact('couriers','time_ranges'));
      }
    }

    public function store(Request $request) {
      if($request->schedule_delivery) {
        $validator = Record::post_schedule_delivery($request);
        //  if validation fail
        if($validator->fails())
        {
          return Redirect::to('gateready/records/create/?schedule-delivery=1')->withErrors($validator)->withInput();
        }
        else
        {
          $record = new Record;
          $record->gateready_user_id = Auth::user()->id;
          $record->tracking_number = $request->tracking_number;
          $record->courier_id = $request->courier_id;
          $record->package_id = $request->package_id;
          $record->schedule_date = $request->schedule_date;
          $record->time_range_id = $request->time_range_id;
          $record->reference_number = $this->generate_code('reference_number');
          // hard code for testing - database set to be not null
          
          $record->status_id = 2;
          $record->message = 'nil';
          $record->save();

          return Redirect::to('/gateready/records');
        }
      }
    }

    public function edit($id, Request $request) {
      if($request->reschedule_delivery) {
        $time_ranges = TimeRange::all();
          return view('gateready/reschedule-delivery',[
          'record_reference_number' => $id,
          'time_ranges' => $time_ranges,
        ]);
      } elseif ($request->feedback) {
        return view('gateready/feedback',[
          'user_id' => Auth::user()->id,
          'record_reference_number' => $id,
        ]);
      }
      
    }

    public function update($id, Request $request) {
      if($request->reschedule_delivery) {
        $validator = Record::post_reschedule_delivery($request);
        //  if validation fail
        if($validator->fails())
        {
          return Redirect::to('/gateready/records/'. $id .'/edit?reschedule_delivery=1')->withErrors($validator)->withInput();
        }
        else
        {
          // echo Input::get('schedule_date');
          // echo $record_reference_number;
          // echo $user_id;
          Record::where([
            'reference_number' => $id,
            'gateready_user_id' => Auth::user()->id,
          ])->update([
            'schedule_date' => $request->schedule_date,
            'time_range_id' => $request->time_range_id,
          ]);

          return Redirect::to('gateready/records');
        }
      } elseif($request->feedback) {
        // echo "$record_reference_number";
        //  validate the input
        $validator = Validator::make(Input::all(),[
          'msg' => 'required',
        ]);

        //  if validator fail
        if($validator->fails())
        {
          return Redirect::to('gateready/records/' .$id .'/edit?feedback=1')->withErrors($validator);
          // echo "$record_reference_number";

        }
        else
        {
          Record::where([
            'gateready_user_id' => Auth::user()->id,
            'reference_number' => $id,
          ])->update([
            
            'message' => $request->msg,
          ]);
          return Redirect::to('gateready/records');
        }
      }
      
    }

    

    

    

    // //  show schedule delivery page
    // public function show_reschedule_delivery(Request $request, $user_id, $record_reference_number)
    // {
    // 	$time_ranges = TimeRange::all();
    //     return view('gateready/reschedule-delivery',[
    // 		'record_reference_number' => $record_reference_number,
    //         'time_ranges' => $time_ranges,
    // 	]);
    // }

    

    

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


}
