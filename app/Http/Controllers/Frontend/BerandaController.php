<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        // definisi nilai default variabel jika kondisi (if) dibawah tidak terpenuhi
        $sr = ""; $ct = ""; $dx = ""; $nd = ""; $wr = ""; $pg = 0; $datas =[];

        // jika request search tidak kosong menambahkan string untuk ambil data berdasar search pada query
        if (!empty($request->search)) {
            $sr = "pst.title LIKE '%".$request->search."%' OR pst.content LIKE '%".$request->search."%'";
        }
        // jika request index tidak kosong menambahkan string untuk ambil data berdasar index pada query
        if (!empty($request->category)) {
           $ct = "ctg.name = '".$request->category."'";
        }
        // jika request index tidak kosong menambahkan string untuk ambil data berdasar index pada query
        if (!empty($request->index)) {
            $dx = "idx.name = '".$request->index."'";
        }
        // jika request category dan index tidak kosong menambahkan string AND pada query
        if (!empty($request->category) && !empty($request->index)) {
           $nd = " AND ";
        }

        // ambil data category dan index yang tersedia pada database
        $categorys = ArticleCategory::orderBy('name', 'asc')->get();
        $indexs = ArticleIndex::orderBy('name', 'asc')->get();

        // jika request search, category dan index tidak kosong ambil data dari database
        if (!empty($request->search) || !empty($request->category) || !empty($request->index)) {
            $datas = DB::select("
                SELECT pst.slug, pst.title FROM article_posts AS pst
                JOIN article_indexs AS idx ON idx.id = pst.index_id
                JOIN article_categorys AS ctg ON ctg.id = pst.category_id
                JOIN users AS usr ON usr.id = pst.user_id WHERE ".$ct.$nd.$dx.$sr." LIMIT 75 OFFSET ".$pg);
        }
        // hitung jumlah data yang didapatkan dari database
        $countdatas = count($datas);

        // data dari hasil query dikirim ke halaman beranda dan ditampilkan
        return view('pages.frontend.beranda/index', compact('categorys','indexs', 'datas', 'countdatas'));
    }
}
