<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
class ArticleController extends Controller
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

    public function page_index($slug)
    {
        $articles = ArticlePost::with([
            'article_index:id,indexx',
            'article_category:id,categoryy',
            'user:id,name'
        ])
        ->where('slug', $slug)
        ->first();
        DB::update('update article_posts set views = views + 1 where slug = ?', [$slug]);
        return view('Pages.Frontend.Article.index', compact('articles'));
    }
}
