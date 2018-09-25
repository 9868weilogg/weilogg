<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	public $incrementing = false;

	protected $fillable = [
		'id','name','current_price',
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
