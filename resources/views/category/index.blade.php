@extends('layouts.app')

@section('content')

    <div style="background: #636b6f;">
        <div style="padding: 10px;">
            <p>Recent Visited News</p>
            <ul>
                @foreach(\Illuminate\Support\Facades\Cache::get(
                             \Facades\App\Facades\HandleRecentNewsFacade::getRecentNewsCacheKey($category->id)
                        ) as $news)
                    <li>{{$news->title}}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <p>News For This Category {{$category->name}} :</p>
    <ul>
        @foreach($category->news as $news)
            <li><a href="{{route('news.get', $news->id)}}">{{$news->title}}</a></li>
        @endforeach
    </ul>
@endsection


