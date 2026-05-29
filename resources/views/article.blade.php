<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Articles</title>
</head>
<body>
<div class="blog-post">
    <h2 class="blog-post-title">{{$article->title}}</h2>
    <p class="blog-post-meta">{{$article->created_at}} by {{$article->author}}</a></p>
    {{$article->content}}
</div>
@foreach($article->tags->sortBy('name') as $tag)
    <p class="btn btn-info">{{$tag->name}}</p>
@endforeach
</body>
</html>
