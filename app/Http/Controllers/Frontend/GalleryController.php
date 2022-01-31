<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticleDocument;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function photo()
    {
        $photos = ArticleDocument::where('type', 'image')->paginate(15);
        return view('Pages.Frontend.Gallery.photo', compact('photos'));
    }
    public function video()
    {
        $videos = ArticleDocument::where('type', 'video')->paginate(15);
        return view('Pages.Frontend.Gallery.video', compact('videos'));
    }
}
