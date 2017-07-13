<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
	protected $model;

	public function __construct()
	{
		return $this->setModel();
	}

	abstract public function getModel();

	public function setModel()
	{
		$this->model = app()->make($this->getModel());
	}

	public function getAll()
	{
		return $this->model->all();
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function findByColumn($att, $column)
	{
		return $yhis->model->where($att, $column)->get();
	}

	public function create(array $att)
	{
		return $this->model->create($att);
	}

	public function update($id, array $att)
	{
		$result = $this->find($id);
		if($result) {
			return $this->update($att);
		}
		return false;
	}

	public function delete($id)
	{
		$result = $this->find($id);
		if($result) {
			return $this->delete();
		}
		return false;
	}
}