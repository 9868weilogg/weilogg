<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\wages\Stock;

class Transaction extends Model
{
    public $incrementing = false;

    protected $fillable = [
    	'id','type','unit','price','stock_id','user_id',
    ];

    //  this transaction belong to a user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    //  this transaction belong to a stock
    public function stock()
    {
    	return $this->belongsTo('App\wages\Stock');
    }
}
