<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.profile');
    }


    public function update(Request $request)
    {
        dd($request->all());
    }

    public function edit()
    {
        return view('frontend.edit_profile');
    }
}
