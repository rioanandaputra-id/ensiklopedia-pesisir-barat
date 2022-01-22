<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use App\Models\ArticlePost;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index(Request $request)
    {

        // ambil data refrensi category dan index yang tersedia pada database
        $categorys = ArticleCategory::orderBy('name', 'asc')->get();
        $indexs = ArticleIndex::orderBy('name', 'asc')->get();

        $datas = [];
        $index = $request->index;
        $category = $request->category;
        $search = $request->search;

        // jika request search, category dan index tidak kosong ambil data article dari database
        if (!empty($search) || !empty($category) || !empty($index)) {

            $datas = ArticlePost::select('slug', 'title')->with([
                'article_index:article_index_id,name',
                'article_category:article_category_id,name',
                'user:user_id,fullname'
            ])
                ->when($index, function ($query, $index) {
                    return $query->whereRelation('article_index', 'name', $index);
                })
                ->when($category, function ($query, $category) {
                    return $query->whereRelation('article_category', 'name', $category);
                })
                ->when($search, function ($query, $search) {
                    return $query->orWhere('title', 'LIKE', '%' . $search . '%')->orWhere('content', 'LIKE', '%' . $search . '%');
                })
                ->paginate(50)->appends(request()->except('page'));
        }

        // hitung jumlah data article yang didapatkan dari database
        $countdatas = count($datas);

        // data dari hasil data yang ditemukan dikirim ke halaman beranda dan ditampilkan
        return view('pages.frontend.beranda/index', compact('categorys', 'indexs', 'datas', 'countdatas'));


        // header('Content-Type: application/json; charset=utf-8');
        // print_r($articles);

            // // definisi nilai default variabel jika kondisi (if) dibawah tidak terpenuhi
            // $sr = ""; $ct = ""; $dx = ""; $nd = ""; $wr = ""; $pg = 0; $datas =[];

            // // jika request search tidak kosong menambahkan string untuk ambil data berdasar search pada query
            // if (!empty($request->search)) {
            //     $sr = "pst.title LIKE '%".$request->search."%' OR pst.content LIKE '%".$request->search."%'";
            // }
            // // jika request index tidak kosong menambahkan string untuk ambil data berdasar index pada query
            // if (!empty($request->category)) {
            //    $ct = "ctg.name = '".$request->category."'";
            // }
            // // jika request index tidak kosong menambahkan string untuk ambil data berdasar index pada query
            // if (!empty($request->index)) {
            //     $dx = "idx.name = '".$request->index."'";
            // }
            // // jika request category dan index tidak kosong menambahkan string AND pada query
            // if (!empty($request->category) && !empty($request->index)) {
            //    $nd = " AND ";
            // }

            // // ambil data category dan index yang tersedia pada database
            // $categorys = ArticleCategory::orderBy('name', 'asc')->get();
            // $indexs = ArticleIndex::orderBy('name', 'asc')->get();

            // // jika request search, category dan index tidak kosong ambil data dari database
            // if (!empty($request->search) || !empty($request->category) || !empty($request->index)) {

            //     // $datas = DB::table('article_posts AS pst')
            //     // ->join('article_indexs AS idx', 'idx.id', '=', 'pst.index_id')
            //     // ->join('article_categorys AS ctg', 'ctg.id', '=', 'pst.category_id')
            //     // ->join('users AS usr', 'usr.id', '=', 'pst.user_id')
            //     // ->select('pst.slug', 'pst.title')
            //     // // ->where($ct.$nd.$dx.$sr." LIMIT 75 OFFSET ".$pg)
            //     // ->paginate(20);

            //     $datas = DB::select("
            //         SELECT pst.slug, pst.title FROM article_posts AS pst
            //         JOIN article_indexs AS idx ON idx.article_index_id = pst.article_index_id
            //         JOIN article_categorys AS ctg ON ctg.article_category_id = pst.article_category_id
            //         JOIN users AS usr ON usr.user_id = pst.user_id WHERE ".$ct.$nd.$dx.$sr." LIMIT 75 OFFSET ".$pg);
            // }
            // // hitung jumlah data yang didapatkan dari database
            // $countdatas = count($datas);

            // // data dari hasil query dikirim ke halaman beranda dan ditampilkan
            // return view('pages.frontend.beranda/index', compact('categorys','indexs', 'datas', 'countdatas'));
    }
}
