<?php

namespace App\wages;

use Illuminate\Database\Eloquent\Model;

class Fundamental extends Model
{
    protected $fillable = [
    	'stock_id','FYE','PE','DY','EPS','DPS','net_profit_gr','share_qty','cash_equivalent','short_term_loan','long_term_loan','gearing','debt_equity','gp_cashflow','net_margin','roe','FCF_per_share','roa',
    ];

    public static function extractFundamentalData($data){
      foreach($data as $lkey => $lines) {
        foreach($lines as $dkey => $d) {
          if($dkey >= "12") {
            if($lkey == "0") {
              $FYE[] = $d;
            }

            if($lkey == "1") {
              $PE[] = $d;
            }

            if($lkey == "2") {
              $DY[] = $d;
            }

            if($lkey == "3") {
              $EPS[] = $d;
            }

            if($lkey == "4") {
              $DPS[] = $d;
            }

            if($lkey == "5") {
              $net_profit_gr[] = $d;
            }

            if($lkey == "6") {
              $roe[] = $d;
            }

            if($lkey == "7") {
              $debt_equity[] = $d;
            }

            if($lkey == "8") {
              $net_margin[] = $d;
            }

            if($lkey == "9") {
              $gearing[] = $d;
            }

            if($lkey == "10") {
              $share_qty[] = $d;
            }

            if($lkey == "11") {
              $FCF_per_share[] = $d;
            }

            if($lkey == "12") {
              $short_loan[] = $d;
            }

            if($lkey == "13") {
              $long_loan[] = $d;
            }

            if($lkey == "14") {
              $total_cash[] = $d;
            }

            if($lkey == "15") {
              $gp_cash[] = $d;
            }
          }
        }
      }

      return [
        'gp_cash' => $gp_cash,
        'total_cash' => $total_cash,
        'long_loan' => $long_loan,
        'short_loan' => $short_loan,
        'FCF_per_share' => $FCF_per_share,
        'share_qty' => $share_qty,
        'gearing' => $gearing,
        'net_margin' => $net_margin,
        'debt_equity' => $debt_equity,
        'roe' => $roe,
        'net_profit_gr' => $net_profit_gr,
        'DPS' => $DPS,
        'EPS' => $EPS,
        'DY' => $DY,
        'PE' => $PE,
        'FYE' => $FYE,
      ];
    }
}
