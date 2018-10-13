<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\BankAccount;

class Cash extends Model
{
    protected $fillable = [
		'description','cash','bank_accounts_id', 'flow',
	];

	public function bank_acc(){
		return $this->belongsTo('App\wages\BankAccount');
	}
}
