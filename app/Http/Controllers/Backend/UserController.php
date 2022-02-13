<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index()
    {
        $this->authorize('isAdministrator');
        return view('Pages.Backend.Master.User.index');
    }

    public function page_add()
    {
        $this->authorize('isAdministrator');
        return view('Pages.Backend.Master.User.add');
    }

    public function page_edit()
    {
        $this->authorize('isAdministrator');
        $users = User::where('id', $this->request->id)->first();
        $documents = Document::where('id', $users->document_id)->first();
        return view('Pages.Backend.Master.User.edit', compact('users', 'documents'));
    }

    public function page_profile()
    {
        $users = User::where('id', Auth::user()->id)->first();
        $documents = Document::where('id', $users->document_id)->first();
        return view('Pages.Backend.Master.User.edit', compact('users', 'documents'));
    }

    public function read_data()
    {
        $this->authorize('isAdministrator');
        $users = User::get();
        if (!empty($this->request->get('active'))) {
            $users->where('active', $this->request->get('active'));
        }

        return FacadesDataTables::of($users)
            ->addColumn('photo', function ($users) {
                $photo = Document::where('id', $users->document_id)->first();
                if (!empty($photo)) {
                    if ($photo->uploaded == 1) {
                        return '<img src="' . url($photo->path) . '" width="50px" height="50px">';
                    } else {
                        return '<img src="' . $photo->path . '" width="50px" height="50px" />';
                    }
                } else {
                    return '<img src="' . url('uploads/gallery/user/no-image.png') . '" width="50px" height="50px">';
                }
            })
            ->addColumn('checkbox', function ($users) {
                return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $users->id . '">';
            })
            ->addColumn('action', function ($users) {
                return '<a href="./user/edit?id=' . $users->id . '" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>';
            })
            ->editColumn('active', function ($users) {
                if ($users->active == 1) {
                    return '<span class="badge badge-success">Aktif</span>';
                } else {
                    return '<span class="badge badge-danger">Tidak Aktif</span>';
                }
            })
            ->editColumn('updated_at', function ($users) {
                return date('d-m-Y H:i:s', strtotime($users->updated_at));
            })
            ->rawColumns(['action', 'checkbox', 'photo', 'active'])
            ->make(true);
    }

    public function create_data()
    {
        $this->authorize('isAdministrator');
        $this->validate($this->request, [
            'role' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'active' => 'required',
        ]);

        $time = time();
        $dir = 'uploads/gallery/user/';
        $user_id = Uuid::uuid4()->toString();
        $document_id = Uuid::uuid4()->toString();

        $user = new User();
        $document = new Document();

        $type = 'image';
        $file = $this->request->file('fotofile');
        $url = $this->request->input('fotourl');
        $role = $this->request->input('role');
        $name = $this->request->input('name');
        $username = $this->request->input('username');
        $email = $this->request->input('email');
        $password = bcrypt($this->request->input('password'));
        $active = $this->request->input('active');

        if (!empty($file)) {

            $title = $file->getClientOriginalName();
            $file->move(public_path($dir), $time . '-' . $title);
            $path = $dir . $time . '-' . $title;

            $document->id = $document_id;
            $document->title = $title;
            $document->path = $path;
            $document->type = $type;
            $document->uploaded = 1;
            $document->save();
        } elseif (!empty($url)) {

            $document->id = $document_id;
            $document->title = $username;
            $document->path = $url;
            $document->type = $type;
            $document->uploaded = 0;
            $document->save();
        } else {

            $document->id = $document_id;
            $document->title = 'default';
            $document->path = $dir . '/default.png';
            $document->type = $url;
            $document->uploaded = 1;
            $document->save();
        }

        $user->id = $user_id;
        $user->document_id = $document->id;
        $user->role = $role;
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->active = $active;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ]);
    }

    public function update_data()
    {
        $validate = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ];

        if (Gate::allows('isAdministrator')) {
            $validate = [
                'role' => 'required',
                'active' => 'required',
            ];
        }

        $this->validate($this->request, $validate);

        $time = time();
        $dir = 'uploads/gallery/user/';
        $type = 'image';

        $users = new User();
        $documents = new Document();
        $new_document_id = Uuid::uuid4()->toString();

        $user_id = $this->request->input('id');
        if(empty($user_id)){
            $user_id = Auth::user()->id;
        }

        $file = $this->request->file('fotofile');
        $url = $this->request->input('fotourl');
        $role = $this->request->input('role');
        $name = $this->request->input('name');
        $username = $this->request->input('username');
        $email = $this->request->input('email');
        $password = $this->request->input('password');
        $active = $this->request->input('active');

        $update_data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
        ];

        if (Gate::allows('isAdministrator')) {
            $update_data = [
                'role' => $role,
                'active' => $active,
            ];
        }

        if (!empty($password)) {
            $update_data['password'] = bcrypt($password);
        }
        $user = $users->where('id', $user_id)->first();
        $user->update($update_data);
        $document = $documents->where('id', $user->document_id)->first();

        if (!empty($file)) {
            if (env('DOCUMENT_ID') == $document->id) {

                $title = $file->getClientOriginalName();
                $file->move(public_path($dir), $time . '-' . $title);
                $path = $dir . $time . '-' . $title;

                $documents->id = $new_document_id;
                $documents->title = $title;
                $documents->path = $path;
                $documents->type = $type;
                $documents->uploaded = 1;
                $documents->save();

                $users->where('id', $user_id)->update([
                    'document_id' => $new_document_id
                ]);
            } else {

                if (file_exists(public_path($document->path))) {
                    unlink(public_path($document->path));
                }

                $title = $file->getClientOriginalName();
                $file->move(public_path($dir), $time . '-' . $title);
                $path = $dir . $time . '-' . $title;
                $documents->where('id', $user->document_id)->update([
                    'title' => $title,
                    'path' => $path,
                    'type' => $type,
                    'uploaded' => 1,
                ]);
            }
        }

        if (!empty($url)) {

            if (env('DOCUMENT_ID') == $document->id) {

                $documents->id = $new_document_id;
                $documents->title = $username;
                $documents->path = $url;
                $documents->type = $type;
                $documents->uploaded = 0;
                $documents->save();

                $users->where('id', $user_id)->update([
                    'document_id' => $new_document_id
                ]);
            } else {

                if (file_exists(public_path($document->path))) {
                    unlink(public_path($document->path));
                }

                $documents->where('id', $user->document_id)->update([
                    'title' => $username,
                    'path' => $url,
                    'type' => $type,
                    'uploaded' => 0,
                ]);
            }
        }

        return back()->with('success', 'Data berhasil diubah');
    }

    public function update_data_status()
    {
        $this->authorize('isAdministrator');
        $id = $this->request->get('checkbox_item');
        $status = $this->request->get('status');
        User::whereIn('id', $id)->update(['active' => $status]);
        return response()->json(['status' => true]);
    }

    public function delete_data()
    {
        $this->authorize('isAdministrator');
        $id = $this->request->get('checkbox_item');

        foreach ($id as $key => $value) {
            $user = User::where('id', $value)->first();
            $document = Document::where('id', $user->document_id)->first();

            if (env('DOCUMENT_ID') != $document->id) {
                if (file_exists(public_path($document->path))) {
                    unlink(public_path($document->path));
                }
                $document->delete();
            }
            $user->delete();
        }

        return response()->json(['status' => true]);
    }
}
