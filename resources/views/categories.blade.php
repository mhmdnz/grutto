@extends('layouts.app')

@section('content')
    <div class="form-inline">
        <form autocomplete="off" style="float: left;" role="form" method="post"
              action="{{route('categories.save')}}">
            <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
                <label for="campaign_id" class="sr-only">Category Name</label>
                <input type="text"
                       placeholder="Operator Name"
                       class="form-control" name="name"
                       id="name">
                <button class="btn btn-info" type="submit">Save</button>
            </div>
        </form>
    </div>

{{--    table--}}
    <table class="footable table table-striped table-advance table-hover">
        <th><i class="icon-bullhorn"></i>Operator ID</th>
        <th><i class="icon-bullhorn"></i>Operator Name</th>
        <th><i class="icon-bullhorn"></i>Action</th>
        {{--        @foreach($operator as $item)    --}}
        <tr style="font-family: tahoma" id="CampaignId">
            <td> salam</td>
            <td> khubi</td>
            <td> haha</td>
        </tr>
        {{--        @endforeach--}}
    </table>

@endsection


