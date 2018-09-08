<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    //  this courier has many record
    public function records()
    {
    	$this->hasMany('App\gateready\Record');
    }
}
