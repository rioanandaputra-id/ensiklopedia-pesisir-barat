<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use App\Models\ArticlePost;
use App\Models\Visitor;
use Ramsey\Uuid\Uuid;

class BerandaController extends Controller
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

    public function page_index()
    {

        // ambil data refrensi category dan index yang tersedia pada database
        $categorys = ArticleCategory::orderBy('categoryy', 'asc')->get();
        $indexs = ArticleIndex::orderBy('indexx', 'asc')->get();

        $datas = [];
        $index = $this->request->index;
        $category = $this->request->category;
        $search = $this->request->search;

        // jika request search, category dan index tidak kosong ambil data article dari database
        if (!empty($search) || !empty($category) || !empty($index)) {

            $datas = ArticlePost::select('slug', 'title', 'body')->with([
                'article_index:id,indexx',
                'article_category:id,categoryy',
                'user:id,name'
            ])
                ->when($index, function ($query, $index) {
                    return $query->whereRelation('article_index', 'indexx', $index);
                })
                ->when($category, function ($query, $category) {
                    return $query->whereRelation('article_category', 'categoryy', $category);
                })
                ->when($search, function ($query, $search) {
                    return $query->orWhere('title', 'LIKE', '%' . $search . '%')->orWhere('body', 'LIKE', '%' . $search . '%');
                })
                ->paginate(50)->appends(request()->except('page'));
        }

        // hitung jumlah data article yang didapatkan dari database
        $countdatas = count($datas);

        // data dari hasil data yang ditemukan dikirim ke halaman beranda dan ditampilkan
        return view('Pages.Frontend.Beranda.index', compact('categorys', 'indexs', 'datas', 'countdatas'));
    }
}
