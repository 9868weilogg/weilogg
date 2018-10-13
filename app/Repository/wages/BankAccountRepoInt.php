<?php namespace App\Repository\wages;

interface BankAccountRepoInt
{
	public function all();

	public function create(array $data);

	public function show($id);

	
}