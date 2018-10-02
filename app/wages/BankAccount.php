<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public $incrementing = false;

    protected $fillable = [
		'id','owner_name','bank','balance',
	];
}
