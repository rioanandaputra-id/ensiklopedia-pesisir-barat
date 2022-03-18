<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageWeb;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PageWebController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        Visitor::create([
            'id' => Uuid::uuid4(),
            'ip_address' => $this->request->ip(),
            'url' => $this->request->fullUrl(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
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
