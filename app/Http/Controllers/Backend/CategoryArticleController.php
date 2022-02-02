<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    protected $request;
    protected $categoryarticle;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->categoryarticle = new ArticleCategory();
    }

    public function index()
    {
        return view('Pages.Backend.comingsoon');
    }
}
