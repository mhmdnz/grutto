<?php


namespace App\Services;

use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagService
{
    protected $tag_repository;
    public function __construct(TagRepository $tag_repository)
    {
        $this->tag_repository = $tag_repository;
    }

    public function save(Request $request)
    {
        return $this->tag_repository->save($request);
    }

    public function getAll()
    {
        return $this->tag_repository->getAll();
    }
}
