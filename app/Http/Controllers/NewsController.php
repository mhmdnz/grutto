<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Traits\NewsServiceAccessor;

class NewsController extends Controller
{
    use NewsServiceAccessor;

    public function save(NewsRequest $request)
    {
        $this->news_service->save($request);

        return view('news.news');
    }

    public function getJson()
    {
        return $this->news_service->getJson();
    }

    public function get($news_id)
    {
        return $this->news_service->showWithTags($news_id);
    }
}
