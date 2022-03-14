<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageWeb;
use Illuminate\Http\Request;

class PageWebController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function about()
    {
        $pageWeb = PageWeb::select('body')->where('title','Tentang')->first();
        return view('Pages.Frontend.PageWeb.about', compact('pageWeb'));
    }

    public function penyusun()
    {
        $pageWeb = PageWeb::select('body')->where('title','Penyusun')->first();
        return view('Pages.Frontend.PageWeb.penyusun', compact('pageWeb'));
    }
}
