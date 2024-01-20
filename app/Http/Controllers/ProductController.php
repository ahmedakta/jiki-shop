<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get active products.
        $products = Product::where('status' , '=' , 1)->paginate(9);
        // Check requset
        if($request->expectsJson()){
            return response()->json(['success' => true ,'data' => $products]);
        }
        $categories = Category::where('parent_id' , '=' , 11)->get();
        $brands = Category::where('parent_id' , '=' , 12)->get();
        $colors = Category::where('parent_id' , '=' , 13)->get();
        return view('frontend.products.index' , compact('categories' , 'brands' , 'colors'))->with('jsonData' , $products->toJson());
    }

    // show product fucntion
    public function show($id)
    {
        $product = Product::find($id);
        return view('frontend.products.show' , compact('product'));
    }


}
