<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(20)->all();
        $products = convertJson($products);

        // Check requset
        if($request->expectsJson()){
            return response()->json(['success' => true ,'data' => $products]);
        }
        return view('frontend.products.index' , compact('products'));
    }
}
