<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index()
    {
        return view('Pages.Backend.Article.index');
    }

    public function page_add()
    {
        $categorys = ArticleCategory::orderBy('categoryy', 'asc')->get();
        return view('Pages.Backend.Article.add', compact('categorys'));
    }

    public function page_edit()
    {
        $id = $this->request->get('slug');
        $posts = ArticlePost::where('slug', $id)->first();
        $categorys = ArticleCategory::orderBy('categoryy', 'asc')->get();
        return view('Pages.Backend.Article.edit', compact('posts', 'categorys'));
    }

    public function create_data()
    {
        $this->validate($this->request, [
            'title' => 'required|string|max:155',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $id = Uuid::uuid4();
        $category_id = $this->request->input('category_id');
        $titlearticle = $this->request->input('title');
        $body = $this->request->input('body');
        $user_id = Auth::user()->id;
        $pott = Str::upper(Str::substr($titlearticle, 0, 1));
        $index = ArticleIndex::where('indexx', $pott)->select('id')->first();
        $post = new ArticlePost();


        $time = time();
        $dir = 'uploads/gallery/article/';
        $file = $this->request->file('fotofile');
        $url = $this->request->input('fotourl');

        if(empty($index)){
            $index = ArticleIndex::where('indexx', '0-9')->select('id')->first();
        }

        if (!empty($file)) {
            $title = $file->getClientOriginalName();
            $file->move(public_path($dir), $time . '-' . $title);
            $path = $dir . $time . '-' . $title;
            $post->article_image = $path;
        } elseif (!empty($url)) {
            $post->article_image = $url;
        } else {
            $post->article_image = env('image_default');
        }

        $post->id = $id;
        $post->title = $titlearticle;
        $post->body = $body;
        $post->article_category_id = $category_id;
        $post->article_index_id = $index->id;
        $post->user_id = $user_id;
        $post->save();

        if ($post) {
            return redirect(url('backend/article/add'))
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

    public function read_data()
    {
        if ($this->request->ajax()) {
            $model = ArticlePost::with('article_index', 'article_category', 'user')
                ->select('article_index_id', 'article_category_id', 'user_id', 'article_image', 'title', 'status', 'updated_at', 'slug');
            if (!empty($this->request->post('status'))) {
                $model->where('status', $this->request->post('status'));
            }
            if(Auth::user()->role == 'Contributor'){
                $model->where('user_id', Auth::user()->id);
            }
            return FacadesDataTables::eloquent($model)
                ->addColumn('article_index', function (ArticlePost $post) {
                    return $post->article_index->indexx;
                })
                ->addColumn('article_category', function (ArticlePost $post) {
                    return $post->article_category->categoryy;
                })
                ->addColumn('user', function (ArticlePost $post) {
                    return $post->user->name;
                })
                ->editColumn('updated_at', function ($model) {
                    return date('d-m-Y H:i:s', strtotime($model->updated_at));
                })
                ->addColumn('action', function ($model) {
                    $btnedit = '<a href="./article/edit?slug=' . $model->slug . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></a>';
                    $btnview = '<a href="../../article/' . $model->slug . '" target="_blank" class="btn btn-primary btn-sm "><i class="fa fa-link"></i></a>';

                    if($model->status != 'Arsip'){
                        return $btnedit . ' ' . $btnview;
                    } else {
                        return $btnedit;
                    }
                })->addColumn('checkbox', function ($model) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $model->slug . '">';
                })->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
    }

    public function update_data()
    {
        $this->validate($this->request, [
            'slug' => 'required',
            'title' => 'required|string|max:155',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $id = $this->request->input('slug');
        $category_id = $this->request->input('category_id');
        $titlearticle = $this->request->input('title');
        $body = $this->request->input('body');
        $pott = Str::upper(Str::substr($titlearticle, 0, 1));
        $index = ArticleIndex::where('indexx', $pott)->select('id')->first();
        if(empty($index)){
            $index = ArticleIndex::where('indexx', '0-9')->select('id')->first();
        }

        $post = ArticlePost::where('slug', $id)->first();

        $article_image = env('image_default');
        $time = time();
        $dir = 'uploads/gallery/article/';
        $file = $this->request->file('fotofile');
        $url = $this->request->input('fotourl');

        if (!empty($file)) {
            if (env('image_default') ==  $post->article_image) {
                $title = $file->getClientOriginalName();
                $file->move(public_path($dir), $time . '-' . $title);
                $path = $dir . $time . '-' . $title;
                $post->article_image = $path;
            } else {
                if (file_exists(public_path( $post->article_image))) {
                    unlink(public_path( $post->article_image));
                }
                $title = $file->getClientOriginalName();
                $file->move(public_path($dir), $time . '-' . $title);
                $path = $dir . $time . '-' . $title;
                $post->article_image = $path;
            }
        }

        if (!empty($url)) {
            if (env('image_default') ==  $post->article_image) {
                $post->article_image = $url;
            } else {
                if (file_exists(public_path( $post->article_image))) {
                    unlink(public_path( $post->article_image));
                }
                $post->article_image = $url;
            }
        }

        $update_data = [
            'title' => $titlearticle,
            'body' => $body,
            'article_category_id' => $category_id,
            'article_index_id' => $index->id
        ];

        $post->update($update_data);

        if ($post) {
            return redirect(url('backend/article'))
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

    public function update_data_status()
    {
        $this->validate($this->request, [
            'checkbox_item' => 'required',
            'status' => 'required'
        ]);
        $id = $this->request->input('checkbox_item');
        $status = $this->request->input('status');
        ArticlePost::whereIn('slug', $id)->update(['status' => $status]);
    }

    public function delete_data()
    {
        $id = $this->request->input('checkbox_item');
        foreach ($id as $key => $value) {
            $post = ArticlePost::where('slug', $value)->first();
            if (env('image_default') != $post->article_image) {
                if (file_exists(public_path($post->article_image))) {
                    unlink(public_path($post->article_image));
                }
            }
            $post->delete();
        }
    }
}
