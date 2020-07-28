<?php


namespace App\Repositories;

use App\Tag;

class TagRepository extends AbstractRepository implements RepositoryInterface
{
    protected $model;
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
}
