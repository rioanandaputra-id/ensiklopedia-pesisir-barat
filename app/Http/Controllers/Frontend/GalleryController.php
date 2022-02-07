<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function page_photo()
    {
        $photos = Document::where('type', 'image')->paginate(15);
        return view('Pages.Frontend.Gallery.photo', compact('photos'));
    }
    public function page_video()
    {
        $videos = Document::where('type', 'video')->paginate(15);
        return view('Pages.Frontend.Gallery.video', compact('videos'));
    }
}
