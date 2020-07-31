<?php


namespace App\Services;

use App\News;
use App\Repositories\NewsRepository;
use App\Tag;
use Illuminate\Http\Request;
use Facades\App\Facades\HandleRecentNewsFacade;

class NewsService
{
    protected $news_repository;
    public function __construct(NewsRepository $news_repository)
    {
        $this->news_repository = $news_repository;
    }

    public function save(Request $request)
    {
        /**
         * @var News $news
         */
        if ($news = $this->news_repository->save($request)){
            foreach (explode(',', $request->tag_ids) as $tag_id) {
                $news->tags()->attach(Tag::find($tag_id));
            }
            return $news;
        }

        return false;
    }

    public function getAll()
    {
        return $this->news_repository->getAll();
    }

    public function getJson()
    {
        return response($this->news_repository->loadWith(['category', 'tags']));
    }

    public function showWithTags($id)
    {
        HandleRecentNewsFacade::save($id);
        return view('news.index',
            [
                'news' => $this->news_repository->getWith($id, ['tags'])
            ]
        );
    }

    public function get($id)
    {
        return $this->news_repository->get($id);
    }

    public function getCategory($id)
    {
        return $this->get($id)->category;
    }
}
