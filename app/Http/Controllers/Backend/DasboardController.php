<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use App\Models\GalleryAlbum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DasboardController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index()
    {
        $mArticle               = new ArticlePost();
        $mAlbum                 = new GalleryAlbum();
        $mUser                  = new User();

        $terbit                 = ['status' => 'Terbit'];
        $arsip                  = ['status' => 'Arsip'];
        $active                 = ['active' => 1];
        $noActive               = ['active' => 0];
        $typePhoto              = ['type' => 'image'];
        $typeVideo              = ['type' => 'video'];
        $user                   = ['user_id' => Auth::user()->id];

        if(Auth::user()->role == 'Contributor'){
            $terbit             = ['status' => 'Terbit', 'user_id' => Auth::user()->id];
            $arsip              = ['status' => 'Arsip', 'user_id' => Auth::user()->id];
        }

        $article['terbit']      = $mArticle->where($terbit)->count();
        $article['arsip']       = $mArticle->where($arsip)->count();
        $albumPhoto['terbit']   = $mAlbum->where($terbit)->where($typePhoto)->count();
        $albumPhoto['arsip']    = $mAlbum->where($arsip)->where($typePhoto)->count();
        $albumVideo['terbit']   = $mAlbum->where($terbit)->where($typeVideo)->count();
        $albumVideo['arsip']    = $mAlbum->where($arsip)->where($typeVideo)->count();
        $photo['terbit']        = $mAlbum->where($terbit)->where($typePhoto)->with('galery_document')->count();
        $photo['arsip']         = $mAlbum->where($arsip)->where($typePhoto)->with('galery_document')->count();
        $video['terbit']        = $mAlbum->where($terbit)->where($typeVideo)->with('galery_document')->count();
        $video['arsip']         = $mAlbum->where($arsip)->where($typeVideo)->with('galery_document')->count();
        $user['active']         = $mUser->where($active)->count();
        $user['nonActive']      = $mUser->where($noActive)->count();

        return view('Pages.Backend.Dasboard.index', compact('article', 'user', 'albumPhoto', 'albumVideo', 'photo', 'video'));
    }
}
