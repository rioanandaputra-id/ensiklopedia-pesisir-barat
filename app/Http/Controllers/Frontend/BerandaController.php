<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use App\Models\ArticlePost;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        // if (!empty($request->search)) {
        //     # code...
        // }
        // if (!empty($request->category)) {
        //     # code...
        // }
        // if (!empty($request->index)) {
        //     # code...
        // }

        $ArticleCategory = ArticleCategory::orderBy('name', 'asc')->get();
        $ArticleIndex = ArticleIndex::orderBy('name', 'asc')->get();
        return view('pages.frontend.beranda/index', compact('ArticleCategory','ArticleIndex'));
    }
}
