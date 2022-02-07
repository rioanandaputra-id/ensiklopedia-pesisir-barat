<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function upload_file()
    {
        $file = $this->request->file('unggah');
        $file_name = $file->getClientOriginalName();
        $file_size = $file->getClientSize();
        $file_extension = $file->getClientOriginalExtension();
        $file_mime = $file->getClientMimeType();
        $file_path = $file->getRealPath();
        $file_hash = $file->hashName();

        $data = [
            'file_name' => $file_name,
            'file_size' => $file_size,
            'file_extension' => $file_extension,
            'file_mime' => $file_mime,
            'file_path' => $file_path,
            'file_hash' => $file_hash,
        ];

        // $this->document_upload->create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'File berhasil diunggah',
            'data' => $file
        ]);
    }
}
