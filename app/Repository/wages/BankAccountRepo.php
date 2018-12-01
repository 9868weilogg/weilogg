<?php 
namespace App\Repository\wages;

use Illuminate\Database\Eloquent\Model;
use App\wages\BankAccount;
use App\wages\Cash;

class BankAccountRepo implements BankAccountRepoInt
{
	// model property on class instances
	protected $bank_account;

	//  constructor to bind model to repo
	public function __construct(BankAccount $bank_account)
	{
		$this->bank_account = $bank_account;
	}

	//  get all instances of model
	public function all()
	{
		return $this->bank_account->all();
	}

	//  create a new record in the database
	public function create(array $data)
	{
		return $this->bank_account->create($data);
	}

	//  show the record with given id
	public function show($id)
	{
		return $this->bank_account->find($id);
	}

	//  update the record with given id
	public function update(array $data, $id)
	{
		$record = $this->bank_account->find($id);
		return $record->update($data);
	}



}