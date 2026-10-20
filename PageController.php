<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // About page
    public function about()
    {
        return view('about');
    }
}
