<?php


namespace App\Facades;

use App\Traits\NewsServiceAccessor;
use Illuminate\Support\Facades\Cache;

class HandleRecentNewsFacade
{
    use NewsServiceAccessor;
    public $recent_news_cache_key = "recent_visited_news";

    public function save($news_id)
    {
        $news = $this->news_service->get($news_id);
        $result = [$news];
        if (Cache::has($this->recent_news_cache_key)) {
            $newses = $this->getResult($news);
            $result = $newses;
        }
        Cache::put($this->recent_news_cache_key, $result);
    }

    /**
     * @param $news
     * @return \Illuminate\Support\Collection
     */
    public function getResult($news): \Illuminate\Support\Collection
    {
        $newses = collect(Cache::get($this->recent_news_cache_key));
        if ($newses->search($news) === false) {
            if ($newses->count() >= 3) {
                $newses->shift();
            }
            $newses->add($news);
        }
        return $newses;
    }
}
