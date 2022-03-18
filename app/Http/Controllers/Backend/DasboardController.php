<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticlePost;
use App\Models\GalleryAlbum;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\Visitor;
use Illuminate\Http\Request;
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
        // $mAlbum                 = new GalleryAlbum();
        $mUser                  = new User();
        $mVisitor               = new Visitor();
        $mUserActivity          = new UserActivity();
        // $rDocument              = 'galery_document';
        $rUserC                 = 'user_created';
        $rUserT                 = 'user_target';
        $terbit                 = ['status' => 'Terbit'];
        $arsip                  = ['status' => 'Arsip'];
        $active                 = ['active' => 1];
        $noActive               = ['active' => 0];
        // $typePhoto              = ['type' => 'image'];
        // $typeVideo              = ['type' => 'video'];
        $user                   = ['user_id' => Auth::user()->id];
        // $articleVisitor         = ['category' => 'artikel'];
        // $photoVisitor           = ['category' => 'galleri foto'];
        // $videoVisitor           = ['category' => 'galleri vidio'];
        // $otherVisitor           = ['category' => 'Lainnya'];
        $dateFrom               =  $this->request->input('dateFrom');
        $dateTo                 =  $this->request->input('dateTo');

        if (Auth::user()->role == 'Contributor') {
            $terbit             = ['status' => 'Terbit', 'user_id' => Auth::user()->id];
            $arsip              = ['status' => 'Arsip', 'user_id' => Auth::user()->id];
        }

        $article['terbit']      = $mArticle->where($terbit)->count();
        $article['arsip']       = $mArticle->where($arsip)->count();
        // $albumPhoto['terbit']   = $mAlbum->where($terbit)->where($typePhoto)->count();
        // $albumPhoto['arsip']    = $mAlbum->where($arsip)->where($typePhoto)->count();
        // $albumVideo['terbit']   = $mAlbum->where($terbit)->where($typeVideo)->count();
        // $albumVideo['arsip']    = $mAlbum->where($arsip)->where($typeVideo)->count();
        // $photo['terbit']        = $mAlbum->where($terbit)->where($typePhoto)->with($rDocument)->count();
        // $photo['arsip']         = $mAlbum->where($arsip)->where($typePhoto)->with($rDocument)->count();
        // $video['terbit']        = $mAlbum->where($terbit)->where($typeVideo)->with($rDocument)->count();
        // $video['arsip']         = $mAlbum->where($arsip)->where($typeVideo)->with($rDocument)->count();
        $user['active']         = $mUser->where($active)->count();
        $user['nonActive']      = $mUser->where($noActive)->count();
        // $visitor['article']     = $mVisitor->where($articleVisitor)->count();
        // $visitor['photo']       = $mVisitor->where($photoVisitor)->count();
        // $visitor['video']       = $mVisitor->where($videoVisitor)->count();
        // $visitor['other']       = $mVisitor->where($otherVisitor)->count();

        $visitorchart = [];
        if ($dateFrom && $dateTo) {
            $visitorchart = Visitor::select(DB::raw("COUNT(*) as count"), DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') AS day"))
                ->whereBetween('created_at', [$dateFrom, $dateTo])
                ->groupBy('day')
                ->orderBy('day')
                ->get();
        } else {
            $visitorchart = Visitor::select(DB::raw("COUNT(*) as count"), DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') AS day"))
                ->groupBy('day')
                ->orderBy('day')
                ->get();
        }

        $Dchart = [];
        $Lchart = [];
        foreach ($visitorchart as $row) {
            $Lchart[] = $row->day;
            $Dchart[] = (int) $row->count;
        }

        if ($this->request->ajax()) {
            if ($dateFrom && $dateTo) {
                return FacadesDataTables::of($mVisitor->whereBetween('created_at', [$dateFrom, $dateTo])->get())->make(true);
            } else {
                return FacadesDataTables::of($mVisitor->get())->make(true);
            }
        }

        return view('Pages.Backend.Dasboard.index', compact('article', 'user', 'Lchart', 'Dchart'));
    }

    public function read_visitor()
    {
        $dateFrom               =  $this->request->input('dateFrom');
        $dateTo                 =  $this->request->input('dateTo');

        print_r($dateFrom);

        // if ($this->request->ajax()) {
        //     $mVisitor               = new Visitor();
        //     if ($dateFrom && $dateTo) {
        //         return FacadesDataTables::of($mVisitor->whereBetween('created_at', [$dateFrom, $dateTo])->get())->make(true);
        //     } else {
        //         return FacadesDataTables::of($mVisitor->get())->make(true);
        //     }
        // }
    }

    // public function read_activity()
    // {
    //     if ($this->request->ajax()) {
    //         $mUserActivity          = new UserActivity();
    //         $rUserC                 = 'user_created';
    //         $rUserT                 = 'user_target';
    //         return                    FacadesDataTables::eloquent($mUserActivity->with($rUserC)->with($rUserT))
    //             ->toJson();
    //     }
    // }
}
