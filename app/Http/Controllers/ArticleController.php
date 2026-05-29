<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function allArticles(): View
    {

        $tags = Tag::has('articles')->get();
        $query_tags = array_filter(array_keys(request()->query()), 'is_int');
        $articles = Article::query();
        if ($query_tags) {
            $articles = $articles->whereHas('tags', function ($query) use ($query_tags) {
                $query->whereIn('id', $query_tags);
            });
        }
        if (\request()->get('nameOrSlug')) {
            $articles
                ->where('title', 'LIKE', \request()->get("nameOrSlug"))
                ->orWhere('slug', '=', \request()->get("nameOrSlug"));
        }
        return view('articles', [
            'articles' => $articles->paginate(15),
            'tags' => $tags,
            'query_tags' => $query_tags
        ]);
    }


    public function article(Article $slug): View
    {
        return view('article', [
            'article' => $slug
        ]);
    }
}
