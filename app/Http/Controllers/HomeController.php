<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Main Slider Offer
        $sliderOffer = Offer::where('offer_title' , '=' , 'Slider Offers')->with('products')->first();
        // dd($sliderOffer);
        return view('frontend.index');
    }
}
