<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        $cart = [];
        // check if user logged in
        if(Auth::check())
        {
            $cart = Auth::user()->cartProducts;
        }else{
            $cart = Session::get('cart');
        }
        return view('frontend.index' , compact('sliderOffer' , 'cart' ));
    }
}
