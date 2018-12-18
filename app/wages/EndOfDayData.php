<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class EndOfDayData extends Model
{
    protected $fillable = [
          'stock_id',
          'high',
          'low',
          'close',
          'open',
          'volume' ,
          'high_52week',
          'low_52week',
          'roe',
          'pe' ,
          'eps',
          'dps',
          'dy' ,
          'market_cap',
        ];
}
