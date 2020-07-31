<?php


namespace App\Traits;

use App\Services\CategoryService;

trait CategoryServiceAccessor
{
    protected $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }
}
