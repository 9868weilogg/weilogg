<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    //  show record page
    public function index()
    {
    	return view('gateready/record');
    }
}
