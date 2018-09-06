<?php

namespace App\Http\Controllers\gateready;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GatereadyRegisterController extends Controller
{
    //  index view gateready register page
    public function index()
    {
    	return view('gateready/register');
    }
}
