<?php namespace App\Repository\wages;

interface TransactionRepoInt
{
	public function all();

	public function create(array $data);

	public function show($id);

	public function update(array $data, $id);

	public function findByField($field,$value);
	
}