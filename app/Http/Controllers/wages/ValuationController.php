<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\wages\ValuationRepo;

class ValuationController extends Controller
{
    protected $vr;

    public function __construct(ValuationRepo $vr)
    {
        $this->vr = $vr;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->id = 1;
        $transaction->type = $request->buySell;
        $transaction->unit = $request->unit;
        $transaction->price = $request->price;
        $transaction->stock_id = $request->stock_id;
        $transaction->user_id = 123;
        $transaction->save();

        return response($transaction->jsonSerialize(),201);
        // return ['1','2'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        return response()->json($this->vr->show($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Blog::where('id',$id)->update([
            'blog_title' => $request->update_title,
            'blog_post' => $request->update_post,
        ]);

        return response(null,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);

        return response(null,200);
    }

    /**
     * Show Valuation
     *
     * @return Response
     */
    public function show_valuation()
    {
        
        return view('wages/wages-valuation');
    }

    /**
     * Upload fundamental
     *
     * @return Response
     */
    public function upload_fundamental(Request $request)
    {
        
        if(Fundamental::where([
            ['stock_id','=',$request->stock_id],
            ['FYE','=',$request->fye],

        ])->count() > 0)
        {
            return "data exists";
        }
        else
        {
            Fundamental::create([
                'stock_id' => $request->stock_id,
                'FYE' => $request->fye,
                'PE' => $request->pe,
                'net_margin' => $request->net_margin,
                'roe' => $request->roe,
                'gearing' => $request->gearing,
                'gp_cashflow' => $request->gp_cashflow,
                'DY' => $request->dy,
                'book_value' => $request->bv,
                'revenue' => $request->revenue,
                'EPS' => $request->eps,
                'DPS' => $request->dps,
                'cash_equivalent' => $request->cash_eq,
                'short_term_loan' => $request->stl,
                'long_term_loan' => $request->ltl,
                'debt_equity' => $request->debt_equity,
                'FCF' => $request->fcf,
                'roa' => $request->roa,
                'asset_turnover' => $request->asset_turnover,
                'net_profit_gr' => $request->np_gr,

            ]);
            // return $request->eps;
        }
    }
}
