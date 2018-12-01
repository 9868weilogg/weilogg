<?php namespace App\Repository\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\Transaction;
use App\wages\User;

class TransactionRepo implements TransactionRepoInt
{
	// model property on class instances
	protected $transaction;

	//  constructor to bind model to repo
	public function __construct(Transaction $transaction)
	{
		$this->transaction = $transaction;
	}

	//  get all instances of model
	public function all()
	{
		return $this->transaction->all();
	}

	//  create a new record in the database
	public function create(array $data)
	{
		return $this->transaction->create($data);
	}

	//  show the record with given id
	public function show($id)
	{
		return $this->transaction->find($id);
	}

	//  update the record with given id
	public function update(array $data, $id)
	{
		$record = $this->transaction->find($id);
		return $record->update($data);
	}

	//  show the record with given field and value
	public function findByField($field,$value)
	{
		return $this->transaction->where($field,$value)->orderBy('created_at','desc')->get();
	}

}