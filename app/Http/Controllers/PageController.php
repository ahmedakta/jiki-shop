<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){}

    public function contact()
    {
        return view('frontend.contact');
    }
}
