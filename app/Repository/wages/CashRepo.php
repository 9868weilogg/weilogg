<?php namespace App\Repository\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\Cash;
use App\wages\BankAccount;

class CashRepo implements CashRepoInt
{
	// model property on class instances
	protected $cash;

	//  constructor to bind model to repo
	public function __construct(Cash $cash)
	{
		$this->cash = $cash;
	}

	//  get all instances of model
	public function all()
	{
		return $this->cash->all();
	}

	//  create a new record in the database
	public function create(array $data)
	{
		return $this->cash->create($data);
	}

	//  show the record with given id
	public function show($id)
	{
		return $this->cash->find($id);
	}

	//  show cash record with field and value given
	public function findByField($field,$value)
	{
		return $this->cash->where($field,$value)->get();
	}

}