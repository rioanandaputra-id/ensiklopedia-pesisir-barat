<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\ArticleIndex;
use App\Models\ArticlePost;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;


class ArticleCategoryController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function read_data()
    {
        if ($this->request->ajax()) {
            $article_category = ArticleCategory::get();
            return FacadesDataTables::of($article_category)
                ->addColumn('action', function ($article_category) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $article_category->id . '`, `' . $article_category->categoryy . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->addColumn('checkbox', function ($article_category) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $article_category->id . '">';
                })
                ->addColumn('count', function ($article_category) {
                    return ArticlePost::where('article_category_id', $article_category->id)->count();
                })
                ->rawColumns([
                    'action',
                    'checkbox',
                    'count'
                ])
                ->make(true);
        }
    }

    public function page_index()
    {
        return view('Pages.Backend.Master.CategoryArticle.index');
    }

    public function create_data()
    {
        $this->validate($this->request, [
            'categoryy' => 'required|string|max:155',
        ]);

        $article_category = new ArticleCategory();
        $article_category->id = Uuid::uuid4()->toString();
        $article_category->categoryy = $this->request->get('categoryy');
        $article_category->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ]);
    }

    public function update_data()
    {
        $this->validate($this->request, [
            'categoryy' => 'required|string|max:155',
        ]);

        $article_category = ArticleCategory::find($this->request->get('id'));
        $article_category->categoryy = $this->request->get('categoryy');
        $article_category->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);
    }

    public function delete_data()
    {
        $this->validate($this->request, [
            'checkbox_item' => 'required',
        ]);

        $checkbox_item = $this->request->get('checkbox_item');
        foreach ($checkbox_item as $item) {
            $article_category = ArticleCategory::find($item);
            $article_category->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
