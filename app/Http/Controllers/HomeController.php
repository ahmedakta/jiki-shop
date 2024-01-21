<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
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
        // *** Main Slider Offer *** //
        $sliderOffer = Offer::where('category_id', 3)
        ->has('products')
        ->with('products')
        ->get();

        // *** User Cart (Session || Database)*** //
        $cart = [];
        $cart = Auth::check() ? Auth::user()->cartProducts : Session::get('cart');

        // *** Features Section *** //
        $features = convertJson(Category::where('parent_id' , '=' , 3)->get()->all());

        // *** Categories Section *** //
        $categories = convertJson(Category::where('parent_id' , '=' , 11)->select('category_name' , 'category_configs')->get());

        // *** One Hot Offer *** //

        // *** Latest Added Active Products *** //
        
        return view('frontend.index' , compact('sliderOffer' , 'cart' , 'features', 'categories'));
    }
}
