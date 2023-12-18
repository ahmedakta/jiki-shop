<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Product;

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
        $sliderOffer = Offer::where('category_id', 3)
        ->has('products')
        ->with('products')
        ->get();

        // Set The Featured Image
        
        return view('frontend.index' , compact('sliderOffer'));
    }
}
