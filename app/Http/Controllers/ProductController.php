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
        $brandId = $request->get('brand_id');
        $colorId = $request->get('color_id');
        $categoryId = $request->get('category_id');
        // Get active products.
        $products = Product::where('status' , '=' , 1);
        if($brandId)
        {
            $products = Product::where('status' , '=' , 1)->whereHas('brand' , function($q) use ($brandId){
                $q->where('categories.id' ,$brandId);
            });
        }
        if($colorId)
        {
            $products = Product::where('status' , '=' , 1)->whereHas('color' , function($q) use ($colorId){
                $q->where('categories.id' ,$colorId);
            });
        }
        if($categoryId)
        {
            $products = Product::where('status' , '=' , 1)->whereHas('category' , function($q) use ($brcategoryIdandId){
                $q->where('categories.id' ,$categoryId);
            });
        }
        $products = $products->paginate(9);
        
        // Check requset
        if($request->expectsJson()){
            return response()->json(['success' => true ,'data' => $products]);
        }


        // Filter Lists
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
