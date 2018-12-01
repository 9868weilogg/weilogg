<?php namespace App\Repository\wages;

interface WatchlistRepoInt
{
	public function all();

	public function create(array $data);

	public function show($id);

	public function update(array $data, $id);

	public function searchStock($value);

	public function delete($id);

	public function showGisRank($id);

	public function createGisRank(array $data);

	public function updateGisRank(array $data,$id);


}