<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    public $incrementing = false;

	protected $fillable = [
		'id','code','name','current_price','share_qty',
	];

    //  this stock has many user
    public function user()
    {
    	return $this->hasMany('App\User');
    }

    //  this stock has many transaction
    public function transaction()
    {
    	return $this->hasMany('App\Wages\Transaction');
    }
}
