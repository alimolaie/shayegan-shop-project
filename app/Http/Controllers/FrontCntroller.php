<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontCntroller extends Controller
{
    public function index()
    {
        return view('front.website.index');
    }
}
