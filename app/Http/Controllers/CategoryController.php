<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Traits\CategoryServiceAccessor;

class CategoryController extends Controller
{
    use CategoryServiceAccessor;

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
