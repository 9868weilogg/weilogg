<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gateready\Record;
use App\User;
use App\gateready\Status;
use App\gateready\Location;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //  show admin page
    public function show_admin()
    {
    	$records = Record::all();
    	//  parse all status for <select> in change status feature
    	$status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

    	if($records->isEmpty())
    	{
    		echo "no record";
    	}
    	else{
    		foreach($records as $record)
    		{
    			$time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
    			$courier[$record->reference_number] = Record::find($record->reference_number)->courier;
    			$status[$record->reference_number] = Record::find($record->reference_number)->status;
    			$location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
    			$address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
    			$customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
    		}

    		return view('gateready/admin',[
	    		'records' => $records,
	    		'courier' => $courier,
	    		'time_range' => $time_range,
	    		'status' => $status,
	    		'location' => $location,
	    		'address' => $address,
	    		'customer' => $customer,
	    		'status_all' => $status_all,
                'location_all' => $location_all,
	    	]);
            // print_r($status);
            // echo $status[$record->reference_number]->name;
    	}
    	
    }


    /*****
    ***
    ***   edit customer's status feature
	***
	*******/
	public function edit_status(Request $request,$record_reference_number)
	{
		// echo "$record_reference_number";

		//   update status of the particular record
        if(Input::get('status_id') == 6)
        {
            Record::where('reference_number',$record_reference_number)->update([
                'status_id' => Input::get('status_id'),
            ]);
            //  transaction quantity increment
            $user_id = Input::get('user_id');
            $user = User::select('transaction_quantity')->where('id',$user_id)->first();
            $new_transaction_quantity = $user->transaction_quantity + 1;
            User::where('id',$user_id)->update([
                'transaction_quantity' =>  $new_transaction_quantity,
            ]);
        }
        else
        {
            Record::where('reference_number',$record_reference_number)->update([
                'status_id' => Input::get('status_id'),
            ]);
        }
		

		return Redirect::to('/gateready/admin');
	}

    /*****
    ***
    ***   edit customer's status feature (FOR AJAX)
    ***
    *******/
    public function edit_status_ajax(Request $request,$record_reference_number)
    {
        // echo "$record_reference_number";

        //   update status of the particular record
        if(Input::get('status_id') == 6)
        {
            Record::where('reference_number',$record_reference_number)->update([
                'status_id' => Input::get('status_id'),
            ]);
            //  transaction quantity increment
            $user_id = Input::get('user_id');
            $user = User::select('transaction_quantity')->where('id',$user_id)->first();
            $new_transaction_quantity = $user->transaction_quantity + 1;
            User::where('id',$user_id)->update([
                'transaction_quantity' =>  $new_transaction_quantity,
            ]);
        }
        else
        {
            Record::where('reference_number',$record_reference_number)->update([
                'status_id' => Input::get('status_id'),
            ]);
        }
        
        $records = Record::all();
        //  parse all status for <select> in change status feature
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            $view = view('gateready/admin-ajax',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ])->render();
        }
        return response()->json(['html' => $view]);
    }

    /*****
    ***
    ***   show all records feature
    ***
    *******/
    public function show_all_records()
    {
        return $this->show_admin();
    }

    /*****
    ***
    ***   show all records feature (for AJAX)
    ***
    *******/

    
    public function show_all_records_ajax()
    {
        $records = Record::all();
        //  parse all status for <select> in change status feature
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            $view = view('gateready/admin-ajax',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ])->render();
            // print_r($status);
            // echo $status[$record->reference_number]->name;

            return response()->json(['html' => $view]);
        }
        
    }

    /*****
    ***
    ***   show all records enter today feature
    ***
    *******/
    public function show_today_records()
    {
        $today_date = \Carbon\Carbon::today();
        $tomorrow_date = \Carbon\Carbon::tomorrow();
        $records = Record::where('created_at','>=',$today_date)->where('created_at','<',$tomorrow_date)->get();
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            return view('gateready/admin',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ]);
            // print_r($status);
            // echo $status[$record->reference_number]->name;
        }
    }

    /*****
    ***
    ***   show all records enter today feature (for AJAX)
    ***
    *******/
    public function show_today_records_ajax()
    {
        $today_date = \Carbon\Carbon::today();
        $tomorrow_date = \Carbon\Carbon::tomorrow();
        $records = Record::where('created_at','>=',$today_date)->where('created_at','<',$tomorrow_date)->get();
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            $view = view('gateready/admin-ajax',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ])->render();
            // print_r($status);
            // echo $status[$record->reference_number]->name;
            return response()->json(['html' => $view]);
        }
    }


    /*****
    ***
    ***   show delivery to be working on today feature
    ***
    *******/
    public function show_today_delivery()
    {
        $today_date_start = \Carbon\Carbon::today()->toDateString();

        $records = Record::where('schedule_date',$today_date_start)->get();
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            return view('gateready/admin',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ]);
            // print_r($status);
            // echo $status[$record->reference_number]->name;
        }
    }

    /*****
    ***
    ***   show delivery to be working on today feature (For AJAX)
    ***
    *******/
    public function show_today_delivery_ajax()
    {
        $today_date_start = \Carbon\Carbon::today()->toDateString();

        $records = Record::where('schedule_date',$today_date_start)->get();
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            $view = view('gateready/admin-ajax',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ])->render();
            // print_r($status);
            // echo $status[$record->reference_number]->name;
            return response()->json(['html' => $view]);
        }
    }


    /*****
    ***
    ***   show remaining delivery to be working on today feature
    ***
    *******/
    public function show_today_remaining_delivery()
    {
        $today_date_start = \Carbon\Carbon::today()->toDateString();

        $records = Record::where('schedule_date',$today_date_start)->where('status_id','!=',6)->get();
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            return view('gateready/admin',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ]);
            // print_r($status);
            // echo $status[$record->reference_number]->name;
        }
    }

    /*****
    ***
    ***   show remaining delivery to be working on today feature (for AJAX)
    ***
    *******/
    public function show_today_remaining_delivery_ajax()
    {
        $today_date_start = \Carbon\Carbon::today()->toDateString();

        $records = Record::where('schedule_date',$today_date_start)->where('status_id','!=',6)->get();
        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            $view = view('gateready/admin-ajax',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ])->render();
            // print_r($status);
            // echo $status[$record->reference_number]->name;
            return response()->json(['html' => $view]);
        }
    }


    /*****
    ***
    ***   filter record based on tracking number feature
    ***
    *******/
    public function filter_tracking_number()
    {
        $validator = Validator::make(Input::all(),[
            'tracking_number' => 'required',
        ]);

        if($validator->fails())
        {
            return Redirect::to('/gateready/admin/Logg5843/filter-tracking-number')->withErrors($validator);
        }

        $tracking_number = Input::get('tracking_number');

        $records = Record::where('tracking_number',$tracking_number)->get();

        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            return view('gateready/admin',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ]);
            // print_r($status);
            // echo $status[$record->reference_number]->name;
        }

    }

    /*****
    ***
    ***   filter record based on tracking number feature (for AJAX)
    ***
    *******/
    public function filter_tracking_number_ajax(Request $request)
    {
        
        //  cannot use Laravel validator because form is not submitted

        // $validator = Validator::make(Input::all(),[
        //     'tracking_number' => 'required',
        // ]);

        // if($validator->fails())
        // {
        //     return Redirect::to('/gateready/admin/Logg5843/filter-tracking-number')->withErrors($validator);
        // }

        $tracking_number = Input::get('tracking_number');
        // return $request->tracking_number;
        // return Input::get('tracking_number');
        $records = Record::where('tracking_number',$tracking_number)->get();

        $status_all = Status::all();
        //  parse all location for <select> in filter location feature
        $location_all = Location::all();

        if($records->isEmpty())
        {
            echo "no record";
        }
        else{
            foreach($records as $record)
            {
                $time_range[$record->reference_number] = Record::find($record->reference_number)->time_range;
                $courier[$record->reference_number] = Record::find($record->reference_number)->courier;
                $status[$record->reference_number] = Record::find($record->reference_number)->status;
                $location[$record->gateready_user_id] = User::find($record->gateready_user_id)->location;
                $address[$record->gateready_user_id] = User::find($record->gateready_user_id)->address;
                $customer[$record->gateready_user_id] = User::find($record->gateready_user_id);
            }

            $view = view('gateready/admin-ajax',[
                'records' => $records,
                'courier' => $courier,
                'time_range' => $time_range,
                'status' => $status,
                'location' => $location,
                'address' => $address,
                'customer' => $customer,
                'status_all' => $status_all,
                'location_all' => $location_all,
            ])->render();
            
            return response()->json(['html' => $view]);
        }

    }

}
