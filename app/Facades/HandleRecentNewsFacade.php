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
        $category = $this->news_service->getCategory($news_id);
        $cache_key = $this->recent_news_cache_key . "_$category->id";
        $result = [$news];
        if (Cache::has($cache_key)) {
            $newses = $this->getResult($news, $cache_key);
            $result = $newses;
        }
        Cache::put($cache_key, $result);
    }

    /**
     * @param $news
     * @param $cache_key
     * @return \Illuminate\Support\Collection
     */
    public function getResult($news, $cache_key): \Illuminate\Support\Collection
    {
        $newses = collect(Cache::get($cache_key));
        if ($newses->search($news) === false) {
            if ($newses->count() >= 3) {
                $newses->shift();
            }
            $newses->add($news);
        }
        return $newses;
    }
}
