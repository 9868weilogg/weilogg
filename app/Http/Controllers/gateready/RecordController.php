<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gateready\Record;


class RecordController extends Controller
{
    //  show record page
    public function index()
    {
    	//retrieve record data
    	$records = Record::all();
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
