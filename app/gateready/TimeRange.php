<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;

class TimeRange extends Model
{
    public function records(){
    	return $this->hasMany('App\gateready\Record');
    }
}
