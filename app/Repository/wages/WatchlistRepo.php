<?php 
namespace App\Repository\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\Watchlist;
use App\wages\Stock;
use App\wages\GisRank;

class WatchlistRepo implements WatchlistRepoInt
{
	// model property on class instances
	protected $watchlist;
	protected $stock;
	protected $gis;

	//  constructor to bind model to repo
	public function __construct(Watchlist $watchlist, Stock $stock, GisRank $gis)
	{
		$this->watchlist = $watchlist;
		$this->stock = $stock;
		$this->gis = $gis;
	}

	//  get all instances of model
	public function all()
	{
		return $this->watchlist->orderBy('created_at','desc')->get();
	}

	//  create a new record in the database
	public function create(array $data)
	{
		return $this->watchlist->create($data);
	}

	//  show the record with given id
	public function show($id)
	{
		return $this->watchlist->where('id',$id)->first();
	}

	//  update the record with given id
	public function update(array $data, $id)
	{
		$record = $this->watchlist->where('id',$id);
		return $record->update($data);
	}

	//  delete the record with given id
	public function delete($id)
	{
		return $this->watchlist->where('id',$id)->delete();
	}

	//  search stock using given name
	public function searchStock($value)
	{
		return $this->stock->where('name','LIKE','%'.$value.'%')->get();
	}

	//  show stock with given id
	public function showStock($id)
	{
		return $this->stock->where('id',$id)->first();
	}

	//  show gis rank with given stock id
	public function showGisRank($id)
	{
		return $this->gis->where('stock_id',$id)->first();
	}

	//  create gis rank
	public function createGisRank(array $data)
	{
		return $this->gis->create($data);
	}

	//  update gis rank with given stock id
	public function updateGisRank(array $data,$id)
	{
		$record = $this->gis->where('stock_id',$id);
		return $record->update($data);
	}

}