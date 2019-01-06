<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\wages\Fundamental;

class FundamentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      Fundamental::truncate();
      
      $files = [
        '3719'=>'panamy.csv',
        '0065'=>'eforce.csv',
        '5027'=>'kmloong.csv',
        '1818'=>'bursa.csv',
        '5168'=>'harta.csv',
        '0166'=>'inari.csv',
        '0138'=>'myeg.csv',
        '7231'=>'wellcall.csv',
        '3255'=>'heim.csv',
        '7277'=>'dialog.csv',
        '2836'=>'carlsberg.csv',
        '7229'=>'favco.csv',
        '0097'=>'vitrox.csv',
        '0090'=>'elsoft.csv',
        '9334'=>'kesm.csv',
        '7022'=>'gtronic.csv',
        '7140'=>'oka.csv',
        '3867'=>'MPI.csv',
        '7235'=>'superlon.csv',
        '5095'=>'hevea.csv',
        '0012'=>'3A.csv',
        '7113'=>'topglove.csv',
        '7052'=>'padini.csv',
        '4715'=>'genm.csv',
        '7084'=>'QL.csv',
      ];

      // dd(count($files));

      foreach($files as $sid => $sname) {

        $filename = $sname;
        $filepath = storage_path().'/app/public/'.$filename;

        $csvFile = file($filepath);

        $data = [];
        foreach($csvFile as $line) {
          $data[] = str_getcsv($line);
        }

        $stock_id = $data[0][2];
        $lastColumn = count($data[0]);

        $fundamentalData = Fundamental::extractFundamentalData($data);

        // dd($fundamentalData['DY']);

        $entryQty = count($fundamentalData['FYE']);

        for($i=0; $i<$entryQty; $i++){
          
          $fundamental = new Fundamental;
          $fundamental->stock_id = $stock_id;
          $fundamental->FYE = $fundamentalData['FYE'][$i];
          $fundamental->DY = $fundamentalData['DY'][$i];
          $fundamental->PE = $fundamentalData['PE'][$i];
          $fundamental->EPS = $fundamentalData['EPS'][$i];
          $fundamental->DPS = $fundamentalData['DPS'][$i];
          $fundamental->net_profit_gr = $fundamentalData['net_profit_gr'][$i];
          $fundamental->share_qty = $fundamentalData['share_qty'][$i];
          $fundamental->cash_equivalent = $fundamentalData['total_cash'][$i];
          $fundamental->short_term_loan = $fundamentalData['short_loan'][$i];
          $fundamental->long_term_loan = $fundamentalData['long_loan'][$i];
          $fundamental->gearing = $fundamentalData['gearing'][$i];
          $fundamental->debt_equity = $fundamentalData['debt_equity'][$i];
          $fundamental->gp_cashflow = $fundamentalData['gp_cash'][$i];
          $fundamental->net_margin = $fundamentalData['net_margin'][$i];
          $fundamental->roe = $fundamentalData['roe'][$i];
          $fundamental->FCF_per_share = $fundamentalData['FCF_per_share'][$i];
          $fundamental->save();
        }

      }

      

      dd(Fundamental::all());
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Fundamental::truncate();
      
      $files = [
        '3719'=>'panamy.csv',
        '0065'=>'eforce.csv',
        '5027'=>'kmloong.csv',
        '1818'=>'bursa.csv',
        '5168'=>'harta.csv',
        '0166'=>'inari.csv',
        '0138'=>'myeg.csv',
        '7231'=>'wellcall.csv',
        '3255'=>'heim.csv',
        '7277'=>'dialog.csv',
        '2836'=>'carlsberg.csv',
        '7229'=>'favco.csv',
        '0097'=>'vitrox.csv',
        '0090'=>'elsoft.csv',
        '9334'=>'kesm.csv',
        '7022'=>'gtronic.csv',
        '7140'=>'oka.csv',
        '3867'=>'MPI.csv',
        '7235'=>'superlon.csv',
        '5095'=>'hevea.csv',
        '0012'=>'3A.csv',
        '7113'=>'topglove.csv',
        '7052'=>'padini.csv',
        '4715'=>'genm.csv',
        '7084'=>'QL.csv',
      ];

      // dd(count($files));

      foreach($files as $sid => $sname) {

        $filename = $sname;
        $filepath = storage_path().'/app/public/'.$filename;

        $csvFile = file($filepath);

        $data = [];
        foreach($csvFile as $line) {
          $data[] = str_getcsv($line);
        }

        $stock_id = $data[0][2];
        $lastColumn = count($data[0]);

        $fundamentalData = Fundamental::extractFundamentalData($data);

        // dd($fundamentalData['DY']);

        $entryQty = count($fundamentalData['FYE']);

        for($i=0; $i<$entryQty; $i++){
          
          $fundamental = new Fundamental;
          $fundamental->stock_id = $stock_id;
          $fundamental->FYE = $fundamentalData['FYE'][$i];
          $fundamental->DY = $fundamentalData['DY'][$i];
          $fundamental->PE = $fundamentalData['PE'][$i];
          $fundamental->EPS = $fundamentalData['EPS'][$i];
          $fundamental->DPS = $fundamentalData['DPS'][$i];
          $fundamental->net_profit_gr = $fundamentalData['net_profit_gr'][$i];
          $fundamental->share_qty = $fundamentalData['share_qty'][$i];
          $fundamental->cash_equivalent = $fundamentalData['total_cash'][$i];
          $fundamental->short_term_loan = $fundamentalData['short_loan'][$i];
          $fundamental->long_term_loan = $fundamentalData['long_loan'][$i];
          $fundamental->gearing = $fundamentalData['gearing'][$i];
          $fundamental->debt_equity = $fundamentalData['debt_equity'][$i];
          $fundamental->gp_cashflow = $fundamentalData['gp_cash'][$i];
          $fundamental->net_margin = $fundamentalData['net_margin'][$i];
          $fundamental->roe = $fundamentalData['roe'][$i];
          $fundamental->FCF_per_share = $fundamentalData['FCF_per_share'][$i];
          $fundamental->save();
        }

      }

      

      dd(Fundamental::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
