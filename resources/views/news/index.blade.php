@extends('layouts.app')

@section('content')
<style>
* {
    box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
    font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
    padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
    float: left;
    width: 100%;
}


/* Fake image */
.fakeimg {
    background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
    background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
    .leftcolumn, .rightcolumn {
        width: 100%;
        padding: 0;
    }
}
</style>
</head>
<body>

<div class="header">
  <h2>{{$news->title}}</h2>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h5>{{$news->created_at}}</h5>
      <div class="fakeimg" style="height:200px;">{{$news->message}}</div>
      <p>Tags</p>
        <ul>
            @foreach($news->tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
@endsection
