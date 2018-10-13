<?php namespace App\Repository\wages;

interface CashRepoInt
{
	public function all();

	public function create(array $data);

	public function show($id);

	public function findByField($field,$value);
}