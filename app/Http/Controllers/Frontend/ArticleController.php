<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($slug)
    {
        $articles = ArticlePost::with([
            'article_index:article_index_id,name',
            'article_category:article_category_id,name',
            'user:user_id,fullname'
        ])
        ->where('slug', $slug)
        ->first();

        return view('Pages.Frontend.Article.index', compact('articles'));
    }
}
