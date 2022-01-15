<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (!empty($request->cari)) {
        //     # code...
        // }
        // if (!empty($request->kategori)) {
        //     # code...
        // }
        // if (!empty($request->index)) {
        //     # code...
        // }

// $id1 = Uuid::uuid4();
// $id2 = Uuid::uuid4();



// echo $id1.'<br>';
// echo $id1.'<br>';

// echo $id2.'<br>';
// echo $id2;

        $ArticleCategory = ArticleCategory::orderBy('name', 'asc')->get();
        $ArticleIndex = ArticleIndex::orderBy('name', 'asc')->get();
        return view('pages.frontend.beranda/index', compact('ArticleCategory','ArticleIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
