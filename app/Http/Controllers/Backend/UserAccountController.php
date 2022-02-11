<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UserAccount;
use App\Models\UserDocument;
use App\Models\Document;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class UserAccountController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index()
    {
        return view('Pages.Backend.Master.User.index');
    }

    public function page_add()
    {
        $roles = Role::all();
        return view('Pages.Backend.Master.User.add', compact('roles'));
    }

    public function page_edit()
    {
        $roles = Role::all();
        $users = UserAccount::where('id', $this->request->id)->first();
        $documents = UserDocument::with('document')->where('user_account_id', $users->id)->first();
        return view('Pages.Backend.Master.User.edit', compact('roles', 'users', 'documents'));
    }

    public function page_profile()
    {
        return view('Pages.Backend.Master.User.profile');
    }



    public function read_data()
    {
        $users = UserAccount::with('role');
        if (!empty($this->request->get('active'))) {
            $users->where('active', $this->request->get('active'));
        }

        return FacadesDataTables::of($users)
            ->addColumn('photo', function ($users) {
                $photo = UserDocument::with('document')->where('user_account_id', $users->id)->first();
                if (!empty($photo)) {
                    if ($photo->document->uploaded == 1) {
                        return '<img src="' . url($photo->document->path) . '" width="50px" height="50px">';
                    } else {
                        return '<img src="' . $photo->document->path . '" width="50px" height="50px" />';
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
        $this->validate($this->request, [
            'role_id' => 'required',
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'active' => 'required',
        ]);

        $time = time();
        $dir = 'uploads/gallery/user/';
        $user_id = Uuid::uuid4()->toString();
        $user_document_id = Uuid::uuid4()->toString();
        $document_id = Uuid::uuid4()->toString();

        $user = new UserAccount();
        $document = new Document();
        $user_document = new UserDocument();

        $type = 'image';
        $file = $this->request->file('fotofile');
        $url = $this->request->input('fotourl');
        $role_id = $this->request->input('role_id');
        $fullname = $this->request->input('fullname');
        $username = $this->request->input('username');
        $email = $this->request->input('email');
        $password = bcrypt($this->request->input('password'));
        $active = $this->request->input('active');

        $user->id = $user_id;
        $user->role_id = $role_id;
        $user->fullname = $fullname;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->active = $active;
        $user->save();

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

        $user_document->id = $user_document_id;
        $user_document->user_account_id = $user->id;
        $user_document->document_id = $document->id;
        $user_document->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ]);
    }

    public function update_data()
    {
        $this->validate($this->request, [
            'role_id' => 'required',
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'active' => 'required',
        ]);

        $time = time();
        $dir = 'uploads/gallery/user/';
        $type = 'image';

        $users = new UserAccount();
        $documents = new Document();
        $user_documents = new UserDocument();

        $user_id = $this->request->input('id');
        $file = $this->request->file('fotofile');
        $url = $this->request->input('fotourl');
        $role_id = $this->request->input('role_id');
        $fullname = $this->request->input('fullname');
        $username = $this->request->input('username');
        $email = $this->request->input('email');
        $password = $this->request->input('password');
        $active = $this->request->input('active');


        $update_data = [
            'role_id' => $role_id,
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email,
            'active' => $active,
        ];
        if (!empty($password)) {
            $update_data['password'] = bcrypt($password);
        }
        $users->where('id', $user_id)->update($update_data);

        $user_document = $user_documents->where('user_account_id', $user_id)->first();
        $document_id = $user_document->document_id;

        if (!empty($file)) {
            unlink(public_path($user_document->document->path));
            $title = $file->getClientOriginalName();
            $file->move(public_path($dir), $time . '-' . $title);
            $path = $dir . $time . '-' . $title;
            $documents->where('id', $document_id)->update([
                'title' => $title,
                'path' => $path,
                'type' => $type,
                'uploaded' => 1,
            ]);
        }

        if (!empty($url)) {
            unlink(public_path($user_document->document->path));
            $documents->where('id', $document_id)->update([
                'title' => $username,
                'path' => $url,
                'type' => $type,
                'uploaded' => 0,
            ]);
        }

        return back()->with('success','Data berhasil diubah');
    }


    public function update_data_status()
    {
        $id = $this->request->get('checkbox_item');
        $status = $this->request->get('status');
        UserAccount::whereIn('id', $id)->update(['active' => $status]);
        return response()->json(['status' => true]);
    }

    public function delete_data()
    {
        $id = $this->request->get('checkbox_item');
        UserAccount::whereIn('id', $id)->delete();
        return response()->json(['status' => true]);
    }
}
