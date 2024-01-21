<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CompareController extends Controller
{
    public function index()
    {


    }

    // we just storing the compared products to the Session...
    public function store(Request $request)
    {
            // WE JUST COMPAIRING 3 PRODUCTS AS MAX

           $productId = $request->all()[0];
           $product = Product::find($productId);
           $compareProducts = $request->session()->get('compareProducts' , []);
           // Check if the product is already in the compared products
           if(count($compareProducts) < 3)
           {
            $status = 'error';
           return response()->json(['status' => $status , 'compareProducts' => null]);
           }
           if (isset($product) && !isset($compareProducts[$product->id])) {
               $compareProducts[$product->id] =
               [
                   'id' => $product->id,
                   'product_title' => $product->product_title,
                   'product_price' => $product->product_price,
                   'product_photos' => $product->product_photos,
               ];
               $status = 'success';
           }else{
               $status = 'deleted';
               unset($compareProducts[$product->id]);
           }
           $request->session()->put('compareProducts', $compareProducts);
           return response()->json(['status' => $status , 'compareProducts' => $compareProducts]);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}

