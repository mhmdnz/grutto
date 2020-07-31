<?php


namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{
    protected $category_repository;
    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    public function save(Request $request)
    {
        return $this->category_repository->save($request);
    }

    public function getAll()
    {
        return $this->category_repository->getAll();
    }

    public function getAllWithNews()
    {
        return $this->category_repository->getAllWith(['news']);
    }
}
