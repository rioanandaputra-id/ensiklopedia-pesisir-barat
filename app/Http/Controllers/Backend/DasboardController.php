<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use App\Models\GalleryAlbum;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\Visitor;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
use Illuminate\Support\Facades\DB;

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
        $mVisitor               = new Visitor();
        $mUserActivity          = new UserActivity();
        $rDocument              = 'galery_document';
        $rUserC                 = 'user_created';
        $rUserT                 = 'user_target';

        $terbit                 = ['status' => 'Terbit'];
        $arsip                  = ['status' => 'Arsip'];
        $active                 = ['active' => 1];
        $noActive               = ['active' => 0];
        $typePhoto              = ['type' => 'image'];
        $typeVideo              = ['type' => 'video'];
        $user                   = ['user_id' => Auth::user()->id];
        $articleVisitor         = ['category' => 'artikel'];
        $photoVisitor           = ['category' => 'galleri foto'];
        $videoVisitor           = ['category' => 'galleri vidio'];
        $otherVisitor           = ['category' => 'Lainnya'];

        if (Auth::user()->role == 'Contributor') {
            $terbit             = ['status' => 'Terbit', 'user_id' => Auth::user()->id];
            $arsip              = ['status' => 'Arsip', 'user_id' => Auth::user()->id];
        }

        $article['terbit']      = $mArticle->where($terbit)->count();
        $article['arsip']       = $mArticle->where($arsip)->count();
        $albumPhoto['terbit']   = $mAlbum->where($terbit)->where($typePhoto)->count();
        $albumPhoto['arsip']    = $mAlbum->where($arsip)->where($typePhoto)->count();
        $albumVideo['terbit']   = $mAlbum->where($terbit)->where($typeVideo)->count();
        $albumVideo['arsip']    = $mAlbum->where($arsip)->where($typeVideo)->count();
        $photo['terbit']        = $mAlbum->where($terbit)->where($typePhoto)->with($rDocument)->count();
        $photo['arsip']         = $mAlbum->where($arsip)->where($typePhoto)->with($rDocument)->count();
        $video['terbit']        = $mAlbum->where($terbit)->where($typeVideo)->with($rDocument)->count();
        $video['arsip']         = $mAlbum->where($arsip)->where($typeVideo)->with($rDocument)->count();
        $user['active']         = $mUser->where($active)->count();
        $user['nonActive']      = $mUser->where($noActive)->count();
        $visitor['article']     = $mVisitor->where($articleVisitor)->count();
        $visitor['photo']       = $mVisitor->where($photoVisitor)->count();
        $visitor['video']       = $mVisitor->where($videoVisitor)->count();
        $visitor['other']       = $mVisitor->where($otherVisitor)->count();

        return view('Pages.Backend.Dasboard.index', compact('article', 'albumPhoto', 'albumVideo', 'photo', 'video', 'user', 'visitor'));
    }

    public function read_visitor()
    {
        if ($this->request->ajax()) {
            $mVisitor               = new Visitor();
            return                    FacadesDataTables::of($mVisitor->get())->make(true);
        }
    }

    public function read_activity()
    {
        if ($this->request->ajax()) {
            $mUserActivity          = new UserActivity();
            $rUserC                 = 'user_created';
            $rUserT                 = 'user_target';
            return                    FacadesDataTables::eloquent($mUserActivity->with($rUserC)->with($rUserT))
                ->toJson();
        }
    }

    public function chart_visitor()
    {
        // $mVisitor               = new Visitor();
        // $articleVisitor         = ['category' => 'artikel'];
        // $photoVisitor           = ['category' => 'galleri foto'];
        // $videoVisitor           = ['category' => 'galleri vidio'];
        // $otherVisitor           = ['category' => 'Lainnya'];
        // $dateFrom               = $this->request->input('dateFrom');
        // $dateTo                 = $this->request->input('dateTo');


        $visitor = Visitor::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Day(created_at)"))
        ->pluck('count');



        // $visitor['article']     = $mVisitor->where($articleVisitor)->WhereBetween('created_at', [$dateFrom, $dateTo])->count();
        // $visitor['photo']       = $mVisitor->where($photoVisitor)->WhereBetween('created_at',   [$dateFrom, $dateTo])->count();
        // $visitor['video']       = $mVisitor->where($videoVisitor)->WhereBetween('created_at',   [$dateFrom, $dateTo])->count();
        // $visitor['other']       = $mVisitor->where($otherVisitor)->WhereBetween('created_at',   [$dateFrom, $dateTo])->count();

        return response()->json($visitor);
    }
}
