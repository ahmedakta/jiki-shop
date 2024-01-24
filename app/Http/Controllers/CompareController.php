<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CompareController extends Controller
{
    public function index(Request $request)
    {

        $compareProducts = $request->session()->get('compareProducts' , []);
        if($request->expectsJson()){
            $status = 'success';
            return response()->json(['status' => $status , 'compareProducts' => $compareProducts]);
        }
        return view('frontend.compare');
    }

    // we just storing the compared products to the Session...
    public function store(Request $request)
    {
            // WE JUST COMPAIRING 3 PRODUCTS AS MAX

           $productId = $request->all()[0];
           $product = Product::find($productId);
           $compareProducts = $request->session()->get('compareProducts' , []);
           // Check if the product is already in the compared products

           if (isset($product) && !isset($compareProducts[$product->id]) && count($compareProducts) < 3) {
               $compareProducts[$product->id] =
               [
                   'id' => $product->id,
                   'product_title' => $product->product_title,
                   'product_price' => $product->product_price,
                   'product_stocks' => $product->product_stocks,
                   'product_customization' => $product->product_customization,
                   'product_water_resistance' => $product->product_water_resistance,
                   'product_photos' => $product->product_photos,
               ];
               $status = __('success');
               $message = __('Added For Comparison');
           }elseif(count($compareProducts) == 3 && !isset($compareProducts[$product->id])){ // if count of compareProdcuts 3 and we trying to add more
            $status = 'error';
            $message =  __('You Cannot Compare More Then 3 Products !');
            return response()->json(['status' => $status , 'message'=> $message ,'compareProducts' => $compareProducts]);
           }else{
               $status = __('success');
                $message =  __('Deleted');
               unset($compareProducts[$product->id]);
           }
           $request->session()->put('compareProducts', $compareProducts);
           return response()->json(['status' => $status ,'message' => $message, 'compareProducts' => $compareProducts]);
    }
}

