@extends('layouts.app')

@section('content')
    <div class="form-inline">
        <form autocomplete="off" style="float: left;" role="form" method="post"
              action="{{route('tags.save')}}">
            @csrf
            <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
                <label for="campaign_id" class="sr-only">Tag Name</label>
                <input minlength="3" maxlength="30" type="text"
                       placeholder="Category Name"
                       class="form-control" name="name"
                       id="name">
                <button class="btn btn-info" type="submit">Save</button>
            </div>
        </form>
    </div>

    {{--    table--}}
    <table class="footable table table-striped table-advance table-hover">
        <th><i class="icon-bullhorn"></i>Name</th>
        <th><i class="icon-bullhorn"></i>Created Time</th>
        @foreach(resolve(\App\Services\TagService::class)->getAll() as $tag)
            <tr style="font-family: tahoma" id="CampaignId">
                <td>{{$tag->name}}</td>
                <td> {{$tag->created_at}}</td>
            </tr>
        @endforeach
    </table>

@endsection


