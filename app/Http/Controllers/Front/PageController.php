<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about()
    {
        return view('front.about');
    }
    
    public function contact()
    {
        return view('front.contact');
    }
}