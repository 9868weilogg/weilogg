<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function records(){
    	return $this->hasMany('App\gateready\Record');
    }
}
