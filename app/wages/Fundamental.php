<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class Fundamental extends Model
{
    protected $fillable = [
    	'stock_id','FYE','PE','DY','EPS','DPS','net_profit_gr','revenue','cash_equivalent','short_term_loan','long_term_loan','book_value','gearing','debt_equity','FCF','gp_cashflow','net_margin','roe','roa','asset_turnover',
    ];
}
