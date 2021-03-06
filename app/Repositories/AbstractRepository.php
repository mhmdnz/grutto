<?php


namespace App\Repositories;


class AbstractRepository
{
    public function save($request)
    {
         return $this->model->create($request->all());
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllWith(array $relations)
    {
        return $this->model->with($relations)->get();
    }

    public function getWith($id, array $relations)
    {
        return $this->model->with($relations)->where('id', $id)->first();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }
}
