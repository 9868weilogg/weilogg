<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\Cash;

class BankAccount extends Model
{
    public $incrementing = false;

    protected $fillable = [
		'id','owner_name','bank','balance',
	];

	public function cash(){
		return $this->hasMany('App\wages\Cash');
	}
}
