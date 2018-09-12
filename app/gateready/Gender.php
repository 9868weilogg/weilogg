<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function users(){
    	return $this->hasMany('App\User');
    }
}
