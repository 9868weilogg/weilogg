<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
		'description','cash','bank_accounts_id', 'flow',
	];
}
