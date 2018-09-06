<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GatereadyLoginController extends Controller
{
    //  index view gateready login page
    public function index()
    {
    	return view('gateready/login');
    }
}
