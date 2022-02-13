<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageWeb;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AboutController extends Controller
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

            $page = PageWeb::where('title', 'about');


            if ($page->count() > 0) {
                $page->update([
                    'body' => $this->request->get('body'),
                ]);
            } else {
                PageWeb::create([
                    'id' => Uuid::uuid4()->toString(),
                    'title' => 'about',
                    'body' => $this->request->get('body'),
                ]);
            }

            return redirect('backend/about')->with('success', 'Data berhasil diubah');
        }

        $about = PageWeb::where('title', 'about')->first();
        return view('Pages.Backend.About.index', compact('about'));
    }
}
