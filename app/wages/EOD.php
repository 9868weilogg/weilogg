<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class EOD extends Model
{
    protected $fillable = [
		'stock_id','last_refreshed','date', 'open','high','low','close','volume',
	];
}
