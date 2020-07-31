<?php


namespace App\Traits;

use App\Services\NewsService;

trait NewsServiceAccessor
{
    protected $news_service;
    public function __construct(NewsService $news_service)
    {
        $this->news_service = $news_service;
    }
}
