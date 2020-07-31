<?php

namespace App\Http\Controllers;

use App\Traits\CategoryServiceAccessor;

class HomeController extends Controller
{
    use CategoryServiceAccessor;

    public function index()
    {
        return view('home');
    }

    public function getAllNews()
    {
        return response(["news" => $this->category_service->getAllWithNews()]);
    }
}
