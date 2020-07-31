<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\NewsService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    public function index()
    {
        return view('home');
    }

    public function getAllNews()
    {
        return response(["news" => $this->category_service->getAllWithNews()]);
    }
}
