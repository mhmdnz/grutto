<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Services\TagService;

class TagController extends Controller
{
    protected $tag_service;
    public function __construct(TagService $tag_service)
    {
        $this->tag_service = $tag_service;
    }

    public function save(TagRequest $request)
    {
        $this->tag_service->save($request);

        return view('tags');
    }
}
