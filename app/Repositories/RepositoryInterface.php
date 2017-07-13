<?php

namespace App\Repositories;

interface RepositoryInterface
{
	public function getAll();

	public function find($id);

	public function findByColumn($att, $column);

	public function create(array $att);

	public function update($id, array $att);

	public function delete($id);
}