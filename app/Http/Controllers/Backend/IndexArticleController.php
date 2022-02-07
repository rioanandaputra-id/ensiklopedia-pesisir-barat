<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexArticleController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index()
    {
        return view('Pages.Backend.Master.IndexArticle.index');
    }
}
