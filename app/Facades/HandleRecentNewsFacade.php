<?php


namespace App\Facades;

use App\Traits\NewsServiceAccessor;

class HandleRecentNewsFacade
{
    use NewsServiceAccessor;

    public function save($news_id)
    {
        $news = $this->news_service->get($news_id);

    }
}
