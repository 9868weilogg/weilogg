<?php

namespace App\Http\Controllers\wages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\wages\WatchlistRepo;
use PHPHtmlParser\Dom;

use App\wages\EndOfDayData;
use App\wages\Stock;


class WatchlistController extends Controller
{
    protected $wr;

    public function __construct(WatchlistRepo $watchlist)
    {
        $this->wr = $watchlist;
    }

    // API search stock given name
    // 
    // 
    public function api_search_stock($name)
    {
        $stock_list = $this->wr->searchStock($name);
        return response()->json($stock_list,200);
    }

    // API index watchlist 
    // 
    // 

    public function api_index_watchlist()
    {
        
        
    	return response()->json($this->wr->all(),200);
    }

    // API show watchlist 
    // 
    // 

    public function api_show_watchlist($id)
    {
        

        return response()->json($this->wr->show($id),200);
    }

    // API add watchlist 
    // 
    // 

    public function api_add_watchlist(Request $request)
    {
        

        $wl = [];
        $wl['id'] = $request->id;
        $wl['code'] = $this->wr->showStock($request->id)->code;
        $wl['name'] = $this->wr->showStock($request->id)->name;
        $wl['share_qty'] = $this->wr->showStock($request->id)->share_qty;
        $wl['current_price'] = $this->wr->showStock($request->id)->current_price;

        $a = $this->wr->show($request->id);
        if(!isset($a)){
            $this->wr->create($wl);
            return response()->json('add success',201);
        }else{
            return response()->json('watchlist existed',201);
        }
        
    }

    //  update price in background

    public function api_update_price(){
        $watchlists = $this->wr->all();
        foreach($watchlists as $watchlist)
        {
            $current_price = $this->get_quotes($watchlist->id);

            $this->wr->update([
                'current_price' => $current_price,
            ],$watchlist->id);
        }
    }

    // API delete watchlist 
    // 
    // 

    public function api_delete_watchlist($id)
    {
        $this->wr->delete($id);

        return response()->json('deleted',201);
    }

    // API show GisRank 
    // 
    // 

    public function api_show_gis_rank($id)
    {

        

        return response()->json($this->wr->showGisRank($id),200);

        
    }

    // API compute buffett 
    // 
    // 

    public function api_compute_buffett(Request $request)
    {
        
        $a = $this->wr->showGisRank($request->stock_id);

        if(isset($a)){
            $this->wr->updateGisRank([
                'ba1' => $request->ba1 ,
                'ba1_1' => $request->ba1_1 ,
                'ba1_2' => $request->ba1_2 ,
                'ba1_3' => $request->ba1_3 ,
                'ba1_4' => $request->ba1_4 ,
                'ba1_5' => $request->ba1_5 ,
                'ba2' => $request->ba2 ,
                'ba3' => $request->ba3 ,
                'ba4' => $request->ba4 ,
                'ba5' => $request->ba5 ,
                'ba6' => $request->ba6 ,
                'ba7' => $request->ba7 ,
                'buffettMark' => $request->buffettMark,
            ],$request->stock_id);

            return response()->json('Update Successful',201);
        }
        else{
            $this->wr->createGisRank([
                'stock_id' => $request->stock_id,
                'ba1' => $request->ba1 ,
                'ba1_1' => $request->ba1_1 ,
                'ba1_2' => $request->ba1_2 ,
                'ba1_3' => $request->ba1_3 ,
                'ba1_4' => $request->ba1_4 ,
                'ba1_5' => $request->ba1_5 ,
                'ba2' => $request->ba2 ,
                'ba3' => $request->ba3 ,
                'ba4' => $request->ba4 ,
                'ba5' => $request->ba5 ,
                'ba6' => $request->ba6 ,
                'ba7' => $request->ba7 ,
                'buffettMark' => $request->buffettMark,
                
            ]);

            return response()->json('Created Successful',201);
        }

        
    }

    // API compute fisher 
    // 
    // 

    public function api_compute_fisher(Request $request)
    {
        $a = $this->wr->showGisRank($request->stock_id);

        if(isset($a)){
            $this->wr->updateGisRank([
                'fa1' => $request->fa1 ,
                'fa2' => $request->fa2 ,
                'fa3' => $request->fa3 ,
                'fa4' => $request->fa4 ,
                'fa5' => $request->fa5 ,
                'fa6' => $request->fa6 ,
                'fa7' => $request->fa7 ,
                'fisherMark' => $request->fisherMark,
            ],$request->stock_id);

            return response()->json('Update Successful',201);
        }
        else{
            $this->wr->createGisRank([
                'stock_id' => $request->stock_id,
                'fa1' => $request->fa1 ,
                'fa2' => $request->fa2 ,
                'fa3' => $request->fa3 ,
                'fa4' => $request->fa4 ,
                'fa5' => $request->fa5 ,
                'fa6' => $request->fa6 ,
                'fa7' => $request->fa7 ,
                'fisherMark' => $request->fisherMark,
                
            ]);

            return response()->json('Created Successful',201);
        }

        
    }

    // watchlist VUE
    // 
    // 

    public function show_watchlist()
    {
        

        return view('wages/wages-watchlist');
    }

    // crawler testing (return links in the crawled page)
    // 
    // 


    public function rel2abs($rel,   $base) {
        if (parse_url($rel,  PHP_URL_SCHEME)  !=  '') {
            return  $rel;
        }
        if ($rel[0] == '#'  ||   $rel[0] == '?') {
            return  $base . $rel;
        }
        extract(parse_url($base));
        $path  =  preg_replace('#/[^/]*$#',  '',   $path);
        if ($rel[0]  ==  '/') {
            $path  =  '';
        }
        $abs  =  "$host$path/$rel";
        $re   =  array('#(/.?/)#',  '#/(?!..)[^/]+/../#');
        for ($n = 1;   $n > 0; $abs = preg_replace($re, '/',   $abs, -1, $n)) {}
        $abs = str_replace('../', '', $abs);
        return  $scheme . '://' . $abs;
    }

    function perfect_url($u, $b) {
        $bp = parse_url($b);
        if (($bp['path'] != '/'  &&   $bp['path'] != '')  ||   $bp['path'] == '') {
            if ($bp['scheme'] == '') {
                $scheme = 'http';
            } else {
                $scheme = $bp['scheme'];
            }
            $b = $scheme . '://' . $bp['host'] . '/';
        }
        if (substr($u, 0, 2) == '//') {
            $u = 'http:' . $u;
        }
        if (substr($u, 0, 4) != 'http') {
            $u = $this->rel2abs($u, $b);
        }
        return  $u;
    }

    public function crawler() {
        $crawled_urls = array();
        $found_urls = array();
        $u = 'http://subinsb.com/';
        $uen = urlencode($u);
        if ((array_key_exists($uen, $crawled_urls) == 0  ||   $crawled_urls[$uen]  <  date('YmdHis', strtotime('-25 seconds',  time())))) {
            $dom    = new Dom;
            $dom->load($u);
            $html              =  $dom->outerHtml;
            $crawled_urls[$uen] = date('YmdHis');
            foreach ($dom->find('span') as  $li) {
                $url   = $this->perfect_url($li->href, $u);
                
                $enurl = urlencode($url);
                if ($url != ''  &&  substr($url, 0, 4) != 'mail'  &&  substr($url, 0, 4) != 'java'  &&  array_key_exists($enurl, $found_urls) == 0) {
                    $found_urls[$enurl] = 1;
                    echo  "<p>" . $url . "</p>";
                }
            }
        }
    }

    // crawler testing (return links in the crawled page)
    // 
    // end

    // crawler get price quote of stock from KLSE screener
    // 
    // 


    public function get_quotes() {
        set_time_limit(5000);
        $stocks = Stock::where('id','1155')->get();
        // dd($stocks);
        foreach($stocks as $stock) {

          $stock_id = $stock->id;
          $u = 'http://www.klsescreener.com/v2/stocks/view/'.$stock_id;
          
          $dom    = new Dom;
          $dom->load($u);
          $html = $dom->outerHtml;

          foreach ($dom->find('span') as  $span) {
              if($span->getAttribute('id') == 'price'){
                  $cp = filter_var($span,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                  $current_price = (double) $cp;
              }
              if($span->getAttribute('id') == 'priceDiff'){
                  $diff = explode("(",$span);
                  $pd = filter_var($diff[0],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                  $price_diff = (double) $pd;
              }
              
          }

          foreach ($dom->find('td') as  $td) {
              if($td->getAttribute('id') == 'priceHigh'){
                  $ph = filter_var($td,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                  $price_high = (double) $ph;
              }
              if($td->getAttribute('id') == 'priceLow'){
                  $pl = filter_var($td,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                  $price_low = (double) $pl;
              }
              if($td->getAttribute('id') == 'volume'){
                  $v = filter_var($td,FILTER_SANITIZE_NUMBER_INT);
                  $volume = (double) $v;
                  
              }
          }
          if($dom->find('td',12)->innerHtml == "52w") $week52_range = explode('-', $dom->find('td',13)->innerHtml);
          if($week52_range) $low_52week = trim($week52_range[0]," ");
          if($week52_range) $high_52week = trim($week52_range[1]," ");
          if($dom->find('td',14)->innerHtml == "ROE") $roe = $dom->find('td',15)->innerHtml;
          if($dom->find('td',16)->innerHtml == "P/E") $pe = $dom->find('td',17)->innerHtml;
          if($dom->find('td',18)->innerHtml == "EPS") $eps = $dom->find('td',19)->innerHtml;
          if($dom->find('td',20)->innerHtml == "DPS") $dps = $dom->find('td',21)->innerHtml;
          if($dom->find('td',22)->innerHtml == "DY") $dy = trim($dom->find('td',23)->innerHtml,"%");
          if($dom->find('td',32)->innerHtml == "Market Cap") $mc = trim($dom->find('td',33)->innerHtml,"M");
          if($mc) $market_cap = str_replace(",","",$mc);
  // dd($market_cap);
          $open_price = $current_price + $price_diff;

          EndOfDayData::create([
            'stock_id' => $stock_id,
            'high' => $price_high,
            'low' => $price_low,
            'close' => $current_price,
            'open' => $open_price,
            'volume' => $volume,
            'high_52week' => $high_52week,
            'low_52week' => $low_52week,
            'roe' => $roe,
            'pe' => $pe,
            'eps' => $eps,
            'dps' => $dps,
            'dy' => $dy,
            'market_cap' => $market_cap,
          ]);
        }
        
        set_time_limit(30);

        return response()->json('get quote success');
    }
}
