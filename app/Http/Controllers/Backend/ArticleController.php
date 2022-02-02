<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $request;
    protected $articlepost;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->articlepost = new ArticlePost();
    }

    public function index()
    {
        if ($this->request->ajax()) {
            $model = ArticlePost::with('article_index', 'article_category', 'user')
                ->select('article_index_id', 'article_category_id', 'user_id', 'title', 'status', 'updated_at', 'slug');
            if (!empty($_GET['page'])) {
                $model->where('status', $_GET['page']);
            }
            return FacadesDataTables::eloquent($model)
                ->addColumn('article_index', function (ArticlePost $post) {
                    return $post->article_index->indexx;
                })
                ->addColumn('article_category', function (ArticlePost $post) {
                    return $post->article_category->categoryy;
                })
                ->addColumn('user', function (ArticlePost $post) {
                    return $post->user->fullname;
                })
                ->editColumn('updated_at', function ($model) {
                    return date('d-m-Y H:i:s', strtotime($model->updated_at));
                })
                ->addColumn('action', function ($model) {
                    return '<a href="./article/edit/' . $model->slug . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></a>
                    <a href="../../article/' . $model->slug . '" target="_blank" class="btn btn-primary btn-sm "><i class="fa fa-link"></i></a>
            ';
                })->addColumn('checkbox', function ($model) {
                    return '<input type="checkbox" name="selected_items[]" value="' . $model->slug . '">';
                })->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
        return view('Pages.Backend.Article.index');
    }


    // public function datatable($status)
    // {

    // }


    public function add()
    {
        $categorys = ArticleCategory::orderBy('categoryy', 'asc')->get();
        return view('Pages.Backend.Article.add', compact('categorys'));
    }

    public function edit($slug)
    {
        $id = ['slug' => $slug];
        $posts = ArticlePost::where($id)->first();
        $categorys = ArticleCategory::orderBy('categoryy', 'asc')->get();
        return view('Pages.Backend.Article.edit', compact('posts', 'categorys'));
    }

    public function create()
    {
        $this->validate($this->request, [
            'title' => 'required|string|max:155',
            'content' => 'required',
            'category' => 'required'
        ]);

        $id = Uuid::uuid4();
        $category_id = $this->request->input('category');
        $title = $this->request->input('title');
        $content = $this->request->input('content');
        $user_id = '5b9c90e3-a01d-48b6-9614-8bfa560b34f8';
        $pott = Str::upper(Str::substr($title, 0, 1));
        $indexx = ArticleIndex::where('indexx', $pott)->select('id')->first();

        $post = ArticlePost::create([
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'article_category_id' => $category_id,
            'article_index_id' => $indexx->id,
            'user_id' => $user_id
        ]);

        if ($post) {
            return redirect()
                ->route('backend.article.create')
                ->with([
                    'success' => 'Artikel baru telah berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi'
                ]);
        }
    }

    public function update()
    {
        $this->validate($this->request, [
            'slug' => 'required',
            'title' => 'required|string|max:155',
            'content' => 'required',
            'category' => 'required'
        ]);

        $id = $this->request->input('slug');
        $category_id = $this->request->input('category');
        $title = $this->request->input('title');
        $content = $this->request->input('content');
        // $user_id = '5b9c90e3-a01d-48b6-9614-8bfa560b34f8';
        $pott = Str::upper(Str::substr($title, 0, 1));
        $indexx = ArticleIndex::where('indexx', $pott)->select('id')->first();

        $post = ArticlePost::where('slug', $id);
        $post->update([
            'title' => $title,
            'content' => $content,
            'article_category_id' => $category_id,
            'article_index_id' => $indexx->id,
            // 'user_id' => $user_id
        ]);

        if ($post) {
            return redirect()
                ->route('backend.article')
                ->with([
                    'success' => 'Artikel berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi'
                ]);
        }
    }

    public function delete($slug)
    {
        $id = ['slug' => $slug];
        $post = ArticlePost::whereIn($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('backend.article')
                ->with([
                    'success' => 'Artikel berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('backend.article')
                ->with([
                    'error' => 'Beberapa masalah telah terjadi, silakan coba lagi'
                ]);
        }
    }
}
