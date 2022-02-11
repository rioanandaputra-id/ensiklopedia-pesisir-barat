<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\GalleryAlbum;
use App\Models\GalleryDocument;
use Illuminate\Http\Request;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;


class GalleryAlbumController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_photo()
    {
        return view('Pages.Backend.Gallery.Photo.index');
    }

    public function page_video()
    {
        return view('Pages.Backend.Gallery.Video.index');
    }

    public function page_edit_photo()
    {
        $id = $this->request->get('id');
        $albums = GalleryAlbum::where('id', $id)->first();
        $photos = GalleryDocument::with('document')->where('gallery_album_id', $id)->get();
        return view('Pages.Backend.Gallery.Photo.edit', compact('albums', 'photos'));
    }

    public function page_edit_video()
    {
        $id = $this->request->get('id');
        $albums = GalleryAlbum::where('id', $id)->first();
        $videos = GalleryDocument::with('document')->where('gallery_album_id', $id)->get();
        return view('Pages.Backend.Gallery.Video.edit', compact('albums', 'videos'));
    }

    public function upload_photo_video()
    {
        $uploaded = $this->request->get('uploaded');
        $type = $this->request->get('type');

        if ($uploaded == 1) {

            if ($type == 'image') {
                $this->validate($this->request, [
                    'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $dir = 'uploads/gallery/photo/';
            } else if ($type == 'video') {
                $this->validate($this->request, [
                    'file' => 'required|mimes:mp4,mov,ogg,qt|max:5120',
                ]);
                $dir = 'uploads/gallery/video/';
            } else {
                return response()->json(['error' => 'Type not found'], 404);
            }

            $time = time();
            $file = $this->request->file('file');
            $title = $file->getClientOriginalName();
            $file->move(public_path($dir), $time . '-' . $title);
            $path = $dir . $time . '-' . $title;

        } else if ($uploaded == 0) {
            $this->validate($this->request, [
                'title' => 'required',
                'url' => 'required|url',
            ]);
            $title = $this->request->get('title');
            $path = $this->request->get('url');
        } else {
            return response()->json(['error' => 'uploaded not found'], 404);
        }

        $document = new Document();
        $document->id = Uuid::uuid4();
        $document->title = $title;
        $document->path = $path;
        $document->type = $type;
        $document->uploaded = $uploaded;
        $document->save();

        $gallery_album_id = $this->request->get('id');
        $gallery_document = new GalleryDocument();
        $gallery_document->id = Uuid::uuid4();
        $gallery_document->gallery_album_id = $gallery_album_id;
        $gallery_document->document_id = $document->id;
        $gallery_document->save();

        return response()->json(['success' => 'File is successfully uploaded'], 200);
    }

    public function unlink_photo_video()
    {
        $id = $this->request->get('id');
        $document = Document::whereIn('id', $id);
        foreach ($document->get() as $key) {
            if (file_exists(public_path($key->path))) {
                unlink(public_path($key->path));
            }
        }
        $document->delete();
    }

    public function read_photo()
    {
        if ($this->request->ajax()) {
            $albums = GalleryAlbum::with('user_account')->where('album', 'image');
            if (!empty($this->request->get('status'))) {
                $albums->where('status', $this->request->get('status'));
            }
            return FacadesDataTables::of($albums)
                ->addColumn('action', function ($albums) {
                    return '<a href="./photo/edit?id=' . $albums->id . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-upload"></i></a>
                <a href="../../gallery/photo/' . $albums->id . '" target="_blank" class="btn btn-primary btn-sm "><i class="fa fa-link"></i></a>';
                })->addColumn('checkbox', function ($albums) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $albums->id . '">';
                })
                ->addColumn('count', function ($albums) {
                    return GalleryDocument::where('gallery_album_id', $albums->id)->count();
                })
                ->editColumn('updated_at', function ($model) {
                    return date('d-m-Y H:i:s', strtotime($model->updated_at));
                })
                ->rawColumns(['action', 'checkbox', 'count'])
                ->make(true);
        }
    }

    public function read_video()
    {
        if ($this->request->ajax()) {
            $albums = GalleryAlbum::with('user_account')->where('album', 'video');
            if (!empty($this->request->get('status'))) {
                $albums->where('status', $this->request->get('status'));
            }
            return FacadesDataTables::of($albums)
                ->addColumn('action', function ($albums) {
                    return '<a href="./video/edit?id=' . $albums->id . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-upload"></i></a>
                <a href="../../gallery/video/' . $albums->id . '" target="_blank" class="btn btn-primary btn-sm "><i class="fa fa-link"></i></a>';
                })->addColumn('checkbox', function ($albums) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $albums->id . '">';
                })
                ->addColumn('count', function ($albums) {
                    return GalleryDocument::where('gallery_album_id', $albums->id)->count();
                })
                ->editColumn('updated_at', function ($model) {
                    return date('d-m-Y H:i:s', strtotime($model->updated_at));
                })
                ->rawColumns(['action', 'checkbox', 'count'])
                ->make(true);
        }
    }

    function create_gallery()
    {
        $this->validate($this->request, [
            'name' => 'required|string|max:155',
            'album' => 'required',
        ]);

        $album = new GalleryAlbum();
        $album->id = Uuid::uuid4();
        $album->user_account_id = env('USER_ACCOUNT_ID');
        $album->name = $this->request->get('name');
        $album->album = $this->request->get('album');
        $album->status = 'Tunggu';
        $album->save();
    }

    public function delete_gallery()
    {
        $this->validate($this->request, [
            'checkbox_item' => 'required',
        ]);

        $checkbox_item = $this->request->get('checkbox_item');
        foreach ($checkbox_item as $item) {
            $album = GalleryAlbum::find($item);
            $album->delete();
        }
    }

    public function update_status_gallery()
    {
        $this->validate($this->request, [
            'checkbox_item' => 'required',
            'status' => 'required',
        ]);

        $checkbox_item = $this->request->get('checkbox_item');
        $status = $this->request->get('status');
        foreach ($checkbox_item as $item) {
            $album = GalleryAlbum::find($item);
            $album->status = $status;
            $album->save();
        }
    }
}
