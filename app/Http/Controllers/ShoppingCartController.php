<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('frontend.cart');
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        dd($product);

    }
}
