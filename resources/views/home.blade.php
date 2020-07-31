@extends('layouts.app')

@section('content')
    <dl id="news_dl">
    </dl>

    <script>
        window.onload = getAllNews();

        function getAllNews() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    loadJsonNews(this.responseText);
                }
            };
            xhttp.open("GET", "{{route('home.news')}}", true);
            xhttp.send();
        }

        function loadJsonNews(json_news) {
            var news = JSON.parse(json_news);
            var result = '';
            news.news.forEach(function (item) {
                result = result + addNewsToDl(item);
            })
            document.getElementById('news_dl').innerHTML = result;
        }

        function addNewsToDl(item) {
            var news_title = "<dt><a href='/category/" + item.id + "' style='cursor: pointer;color: cadetblue'>" + item.name + "</dt>"

            item.news.forEach(function (news) {
                news_title = news_title + addDtToNews(news);
            });

            return news_title;
        }

        function addDtToNews(news) {
            return "<dd><a href='/news/" + news.id + "' style='cursor: pointer;color: dodgerblue'>" + news.title + "</a></dd>";
        }

    </script>
@endsection


