<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    public function save(CategoryRequest $request)
    {
        $this->category_service->save($request);

        return view('category.categories');
    }

    public function get(Category $category)
    {
        die('injas');
    }
}
