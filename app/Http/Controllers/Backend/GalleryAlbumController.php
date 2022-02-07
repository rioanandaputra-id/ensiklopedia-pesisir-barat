<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

    public function read_photo()
    {
        if ($this->request->ajax()) {
            $albums = GalleryAlbum::with('user_account')->where('album', 'image');
            if (!empty($this->request->get('status'))) {
                $albums->where('status', $this->request->get('status'));
            }
            return FacadesDataTables::of($albums)
                ->addColumn('action', function ($albums) {
                    return '<a href="./gallery/photo/edit?id=' . $albums->id . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-upload"></i></a>
                <a href="../../gallery/photo/' . $albums->id . '" target="_blank" class="btn btn-primary btn-sm "><i class="fa fa-link"></i></a>';
                })->addColumn('checkbox', function ($albums) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $albums->id . '">';
                })
                ->addColumn('count', function($albums){
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
                    return '<a href="./gallery/video/edit?id=' . $albums->id . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-upload"></i></a>
                <a href="../../gallery/video/' . $albums->id . '" target="_blank" class="btn btn-primary btn-sm "><i class="fa fa-link"></i></a>';
                })->addColumn('checkbox', function ($albums) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $albums->id . '">';
                })
                ->addColumn('count', function($albums){
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
