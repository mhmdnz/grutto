<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\TagRequest;
use App\News;
use App\Services\NewsService;
use App\Services\TagService;

class NewsController extends Controller
{
    protected $news_service;
    public function __construct(NewsService $news_service)
    {
        $this->news_service = $news_service;
    }

    public function save(NewsRequest $request)
    {
        $this->news_service->save($request);

        return view('news');
    }

    public function getJson()
    {
        return $this->news_service->getJson();
    }
}
