<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleIndex;
use App\Models\ArticlePost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class ArticleIndexController extends Controller
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

    public function read_data()
    {
        if ($this->request->ajax()) {
            $article_index = ArticleIndex::get();
            return FacadesDataTables::of($article_index)
                ->addColumn('checkbox', function ($article_index) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $article_index->id . '">';
                })
                ->addColumn('count', function ($article_index) {
                    return ArticlePost::where('article_index_id', $article_index->id)->count();
                })
                ->rawColumns([
                    'checkbox',
                    'count'
                ])
                ->make(true);
        }
    }

    public function delete_data()
    {
        $this->validate($this->request, [
            'checkbox_item' => 'required',
        ]);

        $checkbox_item = $this->request->get('checkbox_item');
        foreach ($checkbox_item as $item) {
            $article_category = ArticleIndex::find($item);
            $article_category->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
