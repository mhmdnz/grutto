@extends('layouts.app')

@section('content')
    <div class="form-inline">
        <form autocomplete="off" style="float: left;" role="form" method="post"
              action="{{route('news.save')}}">
            @csrf
            <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
                <label for="campaign_id" class="sr-only">Message</label>
                <input minlength="3" type="text"
                       placeholder="Category Name"
                       class="form-control" name="message"
                       id="message">
                <label for="campaign_id" class="sr-only">Category</label>
                <select name="category_id" id="category_id">
                    @foreach(resolve(\App\Services\CategoryService::class)->getAll() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="tag_ids" class="sr-only">Tag Ids</label>
                <input minlength="3" type="text"
                       placeholder="1,2,3..."
                       class="form-control" name="tag_ids"
                       id="tag_ids">
                <button class="btn btn-info" type="submit">Save</button>
            </div>
        </form>
    </div>

    {{--    table--}}
    <table class="footable table table-striped table-advance table-hover" id="myTable">
        <th><i class="icon-bullhorn"></i>Id</th>
        <th><i class="icon-bullhorn"></i>Message</th>
        <th><i class="icon-bullhorn"></i>Category Name</th>
        <th><i class="icon-bullhorn"></i>Tags</th>
        <th><i class="icon-bullhorn"></i>Created Time</th>
    </table>

    <script>
        window.onload = getNews();
        function getNews() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    loadJsonNews(this.responseText);
                }
            };
            xhttp.open("GET", "{{route('news.json')}}", true);
            xhttp.send();
        }

        function loadJsonNews(json_news) {
            var news = JSON.parse(json_news);
            news.forEach(function (item) {
                addNewTableRow(item);
            })
        }

        function addNewTableRow(item) {
            var table = document.getElementById("myTable");
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = item.id;
            cell2.innerHTML = item.message;
            cell3.innerHTML = item.category.name;
            cell5.innerHTML = item.created_at;
            var tag_name = "<ul>";
            item.tags.forEach(function (tag) {
                tag_name = tag_name + "<li>" + tag.name + "</li>";
            });
            tag_name = tag_name + "</ul>";
            cell4.innerHTML = tag_name;
        }
    </script>

@endsection


