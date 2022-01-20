<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($slug)
    {
        $articles = ArticlePost::with(['article_index', 'article_category', 'user'])->where('slug', $slug)->first();
        return view('pages.frontend.article/index', compact('articles'));
    }
}
