<?php


namespace App\Repositories;

use App\News;

class NewsRepository extends AbstractRepository implements RepositoryInterface
{
    protected $model;
    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function loadWith($relations)
    {
        return $this->model->with($relations)->get();
    }
}
