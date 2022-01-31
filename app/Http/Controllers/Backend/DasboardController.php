<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        return view('Pages.Backend.Dasboard.index');
    }
}
