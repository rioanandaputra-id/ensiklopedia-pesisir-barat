<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageWeb;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PenyusunController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function page_index()
    {
        if ($this->request->isMethod('put')) {

            $this->validate($this->request, [
                'body' => 'required',
            ]);

            $page = PageWeb::where('title', 'Penyusun');


            if ($page->count() > 0) {
                $page->update([
                    'body' => $this->request->get('body'),
                ]);
            } else {
                PageWeb::create([
                    'id' => Uuid::uuid4()->toString(),
                    'title' => 'Penyusun',
                    'body' => $this->request->get('body'),
                ]);
            }

            return redirect('backend/penyusun')->with('success', 'Data berhasil diubah');
        }

        $penyusun = PageWeb::where('title', 'Penyusun')->first();
        return view('Pages.Backend.Penyusun.index', compact('penyusun'));
    }
}
