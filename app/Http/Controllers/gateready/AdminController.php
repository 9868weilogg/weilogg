<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gateready\Record;
use App\gateready\GatereadyUser;

class AdminController extends Controller
{
    //  show admin page
    public function show_admin()
    {
    	$records = Record::all();

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
    			$location[$record->gateready_user_id] = GatereadyUser::find($record->gateready_user_id)->location;
    			$address[$record->gateready_user_id] = GatereadyUser::find($record->gateready_user_id)->address;
    			$customer[$record->gateready_user_id] = GatereadyUser::find($record->gateready_user_id);
    		}

    		return view('gateready/admin',[
	    		'records' => $records,
	    		'courier' => $courier,
	    		'time_range' => $time_range,
	    		'status' => $status,
	    		'location' => $location,
	    		'address' => $address,
	    		'customer' => $customer,
	    	]);
    	}
    	
    }
}
