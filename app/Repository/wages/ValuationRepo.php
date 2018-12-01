<?php 
namespace App\Repository\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\Fundamental;

class ValuationRepo implements ValuationRepoInt
{
	// model property on class instances
	protected $fundamental;

	//  constructor to bind model to repo
	public function __construct(Fundamental $fundamental)
	{
		$this->fundamental = $fundamental;
	}

	//  get all instances of model
	public function all()
	{
		return $this->fundamental->orderBy('stock_id','asc')->get();
	}

	//  create a new record in the database
	public function create(array $data)
	{
		return $this->fundamental->create($data);
	}

	//  show the record with given id
	public function show($id)
	{
		return $this->fundamental->where('stock_id',$id)->orderBy('FYE','desc')->get();
	}

	//  update the record with given id
	public function update(array $data, $id)
	{
		$record = $this->fundamental->where('id',$id);
		return $record->update($data);
	}

	//  delete the record with given id
	public function delete($id)
	{
		return $this->fundamental->where('id',$id)->delete();
	}

	

}