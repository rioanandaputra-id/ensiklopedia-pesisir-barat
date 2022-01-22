<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticleDocument;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function photo()
    {
        $photos = ArticleDocument::WHERE('type', 'image')->paginate(15);
        return view('pages.frontend.gallery/photo', compact('photos'));
    }
    public function video()
    {
        $videos = ArticleDocument::WHERE('type', 'video')->GET();
        return view('pages.frontend.gallery/video', compact('videos'));
    }
}
