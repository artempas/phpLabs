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
<form method="get">
    <div class="form-group">
        <input type="text" name="nameOrSlug" class="form-control" id="nameOrSlug" placeholder="Name or slug">
    </div>

    @csrf
    <div>
        @foreach($tags as $tag)
            <div class="form-check d-inline">
                <input class="form-check-input" type="checkbox" name="{{$tag->id}}" value="1" id="{{$tag->id}}"
                       @if(in_array($tag->id, $query_tags)) checked @endif>
                <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>
<div class="list-group">
    @foreach($articles as $article)
        <a href="{{route('article',$article->slug)}}"
           class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$article->title}}</h5>
                <small class="text-muted">{{$article->created_at}}</small>
            </div>
            <p class="mb-1">{{$article->content}}</p>
            <small class="text-muted">{{$article->author}}</small>
        </a>
    @endforeach
</div>
<div class="d-flex paginator justify-content-center">{{ $articles->links()}}</div>
</body>
</html>
