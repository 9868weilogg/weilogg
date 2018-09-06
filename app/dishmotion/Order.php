<?php

namespace App\dishmotion;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //this order has one kolej
    public function Kolej()
    {
    	return $this->hasOne('App\Kolej');
    }

    //this order has one menu
    public function Menu()
    {
    	return $this->hasOne('App\Menu');
    }
}
