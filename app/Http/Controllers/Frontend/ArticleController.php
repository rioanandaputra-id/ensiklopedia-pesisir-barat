<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index($slug)
    {
        $articles = ArticlePost::with([
            'article_index:id,indexx',
            'article_category:id,categoryy',
            'user:id,name'
        ])
        ->where('slug', $slug)
        ->first();

        return view('Pages.Frontend.Article.index', compact('articles'));
    }
}
